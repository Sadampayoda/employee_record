<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresenceCreateRequest;
use App\Http\Requests\PresenceUpdateRequest;
use App\Models\Employee;
use App\Models\EmpPresence;
use App\Repository\Interface\CrudInterface;
use Illuminate\Http\Request;

class EmpPresenceController extends Controller
{
    protected $crud;
    public function __construct(CrudInterface $crudInterface)
    {
        $this->crud = $crudInterface;
        $this->crud->setModel(new EmpPresence());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('presence.index',[
            'data' => $this->crud->all([],5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presence.create',[
            'employee' => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PresenceCreateRequest $presenceCreateRequest)
    {

        $data = $presenceCreateRequest->only(['employee_id','check_id','check_out']);

        $data['late_id'] = EmpPresence::late_in($data['check_id']);
        $data['early_out'] = EmpPresence::early_out($data['check_out']);
        $this->crud->create($data);
        return redirect()->route('presence.index')->with('success',' Presence data successfully added');
        // $this->crud->create()
    }

    /**
     * Display the specified resource.
     */
    public function show(EmpPresence $empPresence)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('presence.edit',[
            'presence' => $this->crud->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PresenceUpdateRequest $presenceUpdateRequest, int $id)
    {
        $data = $presenceUpdateRequest->only(['check_id','check_out']);
        $data['late_id'] = EmpPresence::late_in($data['check_id']);
        $data['early_out'] = EmpPresence::early_out($data['check_out']);
        $this->crud->update($data,$id);
        return redirect()->route('presence.index')->with('success',' Presence data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // dd($empPresence);
        $this->crud->delete($id);
        return redirect()->route('presence.index')->with('success',' Presence data successfully deleted');
    }
}
