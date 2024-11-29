<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryCreateRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Models\Employee;
use App\Models\EmpSalary;
use App\Repository\Interface\CrudInterface;
use Illuminate\Http\Request;

class EmpSalaryController extends Controller
{
    protected $crud;

    public function __construct(CrudInterface $crudInterface)
    {
        $this->crud = $crudInterface;
        $this->crud->setModel(new EmpSalary());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('salary.index', [
            'data' => $this->crud->all(['employee'], 5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salary.create', [
            'employees' => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalaryCreateRequest $salaryCreateRequest)
    {
        $data = $salaryCreateRequest->only([
            'employee_id', 'month', 'year', 'basic_salary', 'loan'
        ]);
        EmpSalary::setSalaryAttributes(
            $data['basic_salary'],
            $salaryCreateRequest->late_minutes ?? 0,
            $salaryCreateRequest->early_minutes ?? 0,
            $data['loan'] ?? 0
        );
        $this->crud->create($data);
        return redirect()->route('salary.index')->with('success', 'Salary data successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(EmpSalary $empSalary)
    {
        return view('salary.show', [
            'salary' => $empSalary
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('salary.edit', [
            'salary' => $this->crud->find($id),
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalaryUpdateRequest $salaryUpdateRequest, int $id)
    {
        $data = $salaryUpdateRequest->only([
            'month', 'year', 'basic_salary', 'bonus',
            'bpjs', 'jp', 'loan', 'total_salary'
        ]);
        $this->crud->update($data, $id);
        return redirect()->route('salary.index')->with('success', 'Salary data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->crud->delete($id);
        return redirect()->route('salary.index')->with('success', 'Salary data successfully deleted');
    }
}
