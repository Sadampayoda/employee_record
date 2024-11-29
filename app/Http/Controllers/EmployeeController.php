<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Repository\Interface\CrudInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $crud;
    public function __construct(CrudInterface $crudInterface)
    {
        $this->crud = $crudInterface;
        $this->crud->setModel(new Employee());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.index',[
            'data' => $this->crud->all([],5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeCreateRequest $employeeCreateRequest)
    {
        $data = $employeeCreateRequest->only(['name','email','address','phone','user_picture','password']);
        $data['user_picture'] = Employee::uploadFile($employeeCreateRequest->file('user_picture'));
        $this->crud->create($data);
        return redirect()->route('employee.index')->with('success',' Employee data successfully added');
        // $this->crud->create()
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $data = $this->crud->find($employee->id,['emp_presence']);
        return view('employee.show',[
            'employee' => $data[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',[
            'employee' => $this->crud->find($employee->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $employeeUpdateRequest, Employee $employee)
    {
        $data = $employeeUpdateRequest->only(['name','email','address','phone','user_picture','user_picture_old']);

        if($employeeUpdateRequest->file('user_picture'))
        {
            $data['user_picture'] = Employee::updateFile($employeeUpdateRequest->file('user_picture'),$data['user_picture_old']);
        }else{
            $data['user_picture'] = $data['user_picture_old'];
        }
        $this->crud->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'user_picture' => $data['user_picture'],
        ],$employee->id);
        return redirect()->route('employee.index')->with('success',' Employee data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->crud->delete($employee->id);
        Employee::destroyFile($employee->user_picture);
        return redirect()->route('employee.index')->with('success',' Employee data successfully deleted');
    }
}
