<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        //dd($employees);

        return view('employee.index',[
            'employees'=>$employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            'cedula'=>['numeric','required','unique:employees,cedula'],
            'name'=>['required','string'],
            'sex'=>['required','boolean'],
            'date_admission'=>['required','date'],
            'birthday'=>['required','date'],
            'type'=>['required','string'],
            'cost'=>['required','string'],
            'cost_description'=>['required','string'],
            'sap'=>['required','string'],
            'sap_description'=>['required','string'],
            'job'=>['required','string'],
            'job_description'=>['required','string'],
            'location'=>['required','string'],
            'affiliate'=>['required','boolean'],
            
        ]);

        Employee::create([
            'cedula'=>$request->input('cedula'),
            'name'=>$request->input('name'),
            'sex'=>$request->input('sex'),
            'date_admission'=>$request->input('date_admission'),
            'birthday'=>$request->input('birthday'),
            'type'=>$request->input('type'),
            'cost'=>$request->input('cost'),
            'cost_description'=>$request->input('cost_description'),
            'sap'=>$request->input('sap_description'),
            'sap_description'=>$request->input('sap_description'),
            'job'=>$request->input('job_description'),
            'job_description'=>$request->input('job_description'),
            'location'=>$request->input('location'),
            'affiliate'=>$request->input('affiliate'),
        ]);

        return redirect()->route('employee.index')->with('success','Creado con Exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();

        //dd($employee->sex);

        return view('employee.edit',[
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cedula'=>['numeric','required','unique:employees,cedula,'.$id],
            'name'=>['required','string'],
            'sex'=>['required','boolean'],
            'date_admission'=>['required','date'],
            'birthday'=>['required','date'],
            'type'=>['required','string'],
            'cost'=>['required','string'],
            'cost_description'=>['required','string'],
            'sap'=>['required','string'],
            'sap_description'=>['required','string'],
            'job'=>['required','string'],
            'job_description'=>['required','string'],
            'location'=>['required','string'],
            'affiliate'=>['required','boolean'],
            
        ]);

        Employee::where('id',$id)->update([
            'cedula'=>$request->input('cedula'),
            'name'=>$request->input('name'),
            'sex'=>$request->input('sex'),
            'date_admission'=>$request->input('date_admission'),
            'birthday'=>$request->input('birthday'),
            'type'=>$request->input('type'),
            'cost'=>$request->input('cost'),
            'cost_description'=>$request->input('cost_description'),
            'sap'=>$request->input('sap_description'),
            'sap_description'=>$request->input('sap_description'),
            'job'=>$request->input('job_description'),
            'job_description'=>$request->input('job_description'),
            'location'=>$request->input('location'),
            'affiliate'=>$request->input('affiliate'),
        ]);

        return back()->with('success','Editado con Exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
