<?php

namespace App\Http\Controllers;

use App\EmailEmployee;
use App\Employee;
use App\Phone;
use App\Secretary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:read', ['only' => ['show']]);
        $this->middleware('permission:edit', ['only' => ['edit','update']]);
        $this->middleware('permission:create', ['only' => ['create','store']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        //dd(Carbon::parse($employees->first()->birthday)->age);

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
        $secretaries = Secretary::all();

        return view('employee.create',[
            'secretaries'=>$secretaries,
        ]);
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
            'date-desaffiliated'=>['nullable','date'],
            'date-affiliated'=>['nullable','date'],
            'email'=>['array'],
            'email.*'=>['string', 'email', 'max:255', 'unique:email_employees,email'],
            'phone'=>['array'],
            'secretary'=>['array','min:1','required'],
            'secretary.*'=>['required','exists:secretaries,id'],
            
        ]);

        $employee = Employee::create([
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
            'affiliated'=>$request->input('affiliate'),
        ]);

        foreach ($request->input('email') as $email) {
            
            EmailEmployee::create([
                'employee_id'=>$employee->id,
                'email'=>$email
            ]);

        }

        foreach ($request->input('phone') as $phone) {
            
            Phone::create([
                'employee_id'=>$employee->id,
                'code'=>null,
                'phone'=>$phone,
            ]);

        }

        $employee->secretaries()->attach($request->input('secretary'));
            

        return redirect()->route('employee.index')->with('success','Creado con Exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with(['emails','phones','secretaries'])->where('id',$id)->first();
        
        return view('employee.show',[
            'employee'=>$employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with(['emails','phones','secretaries'])->withCount(['emails','phones'])->where('id',$id)->first();

        //dd($employee);

        $secretaries = Secretary::all();

        return view('employee.edit',[
            'employee' => $employee,
            'secretaries'=>$secretaries,
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
            'date-desaffiliated'=>['nullable','date'],
            'date-affiliated'=>['nullable','date'],
            'email'=>['array'],
            'email.*'=>['string', 'email', 'max:255', 'unique:email_employees,email'],
            'phone'=>['array'],
            'secretary'=>['array','min:1','required'],
            'secretary.*'=>['required','exists:secretaries,id'],
            
        ]);

        $employee = Employee::where('id',$id)->first();

        $employee->update([
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
            'affiliated'=>$request->input('affiliate'),
            'disaffiliated_date'=>$request->input('date-desaffiliated'),
            'affiliated_date'=>$request->input('date-affiliated'),
        ]);

        EmailEmployee::where('employee_id',$id)->delete();
        
        Phone::where('employee_id',$id)->delete();

        foreach ($request->input('email') as $email) {
            
            EmailEmployee::create([
                'employee_id'=>$employee->id,
                'email'=>$email
            ]);

        }

        foreach ($request->input('phone') as $phone) {
            
            Phone::create([
                'employee_id'=>$employee->id,
                'code'=>null,
                'phone'=>$phone,
            ]);

        }

        return back()->with('success','Editado con Exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();

        return back()->with('success','Eliminado Exitosamente');
    }
}
