<?php

namespace App\Http\Controllers;

use App\EmailEmployee;
use App\Employee;
use App\Exports\Employees;
use App\Phone;
use App\Secretary;
use App\Sex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



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
        $employees = Employee::with('sex')->get();

        //dd(Carbon::parse($employees->first()->birthday)->age);

        return view('employee.index',[
            'employees'=>$employees,
        ]);
    }

    public function consult()
    {
        $employees = Employee::with('sex')->get();

        //dd(Carbon::parse($employees->first()->birthday)->age);

        return view('employee.consult',[
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
        
        $sexes = Sex::all();

        return view('employee.create',[
            'secretaries'=>$secretaries,
            'sexes'=>$sexes,
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
            'sex'=>['required','exists:sexes,id'],
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
            'monto_802'=>['numeric','nullable'],
            'monto_804'=>['numeric','nullable'],
            'monto_806'=>['numeric','nullable'],
            'monto_807'=>['numeric','nullable'],
            'monto_808'=>['numeric','nullable'],
            'memo'=>['string','nullable'],
            
        ]);

        $employee = Employee::create([
            'cedula'=>$request->input('cedula'),
            'name'=>$request->input('name'),
            'sex_id'=>$request->input('sex'),
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
            'monto_802'=>$request->input('monto_802'),
            'monto_804'=>$request->input('monto_804'),
            'monto_806'=>$request->input('monto_806'),
            'monto_807'=>$request->input('monto_807'),
            'monto_808'=>$request->input('monto_808'),
            'memo'=>$request->input('memo'),
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
        $employee = Employee::with(['emails','phones','secretaries','sex'])->where('id',$id)->first();
        
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

        $sexes = Sex::all();

        $secretaries = Secretary::all();

        return view('employee.edit',[
            'employee' => $employee,
            'secretaries'=>$secretaries,
            'sexes'=>$sexes,
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
            'name'=>['required','string'],
            'sex'=>['required','exists:sexes,id'],
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
            'email.*'=>['string', 'email', 'max:255'],
            'phone'=>['array'],
            'secretary'=>['array','min:1','required'],
            'monto_802'=>['numeric','nullable'],
            'monto_804'=>['numeric','nullable'],
            'monto_806'=>['numeric','nullable'],
            'monto_807'=>['numeric','nullable'],
            'monto_808'=>['numeric','nullable'],
            'memo'=>['string','nullable'],
            
        ]);

        $employee = Employee::where('id',$id)->first();

        $employee->update([
            'name'=>$request->input('name'),
            'sex_id'=>$request->input('sex'),
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
            'monto_802'=>$request->input('monto_802'),
            'monto_804'=>$request->input('monto_804'),
            'monto_806'=>$request->input('monto_806'),
            'monto_807'=>$request->input('monto_807'),
            'monto_808'=>$request->input('monto_808'),
            'memo'=>$request->input('memo'),
        ]);

        $employee->secretaries()->sync($request->input('secretary'));

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

        return redirect()->route('employee.index')->with('success','Editado con Exito!');
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

    public function download(Request $request)
    {
        $result = array();

        foreach ($request->input('employees') as $employee) {
            $result[] = $employee[0];
        }

        $employees = Employee::with(['sex','emails'])->whereIn('cedula',$result)->get();

        $result = array();

        foreach ($employees as $employee) {

            $emails = '';
            
            $phones = '';

            foreach ($employee->emails  as $email) {
                
                $emails =  $emails.'|'.$email->email;

            }

            foreach ($employee->phones  as $phone) {
                
                $phones =  $phones.'|'.$phone->phone;

            } 
            
            $result[] = [
                1=>$employee->cedula,
                2=>$employee->name,
                3=>$employee->date_admission,
                4=>$employee->birthday,
                5=>Carbon::parse($employee->birthday)->age,
                6=>$employee->sex->description,
                7=>$employee->cost,
                8=>$employee->cost_description,
                9=>$employee->sap,
                10=>$employee->sap_description,
                11=>$employee->job,
                12=>$employee->job_description,
                13=>$employee->location,
                14=>$employee->affiliated_date,
                15=>$employee->disaffiliated_date,
                16=>$employee->description,
                17=>$employee->affiliated == true ? 'Si' : 'No',
                23=>$employee->memo,
                24=>$employee->type,
                25=>$emails,
                26=>$phones,
            ];


        }

        //return \Response::json($result);

        $name = date('d-m-Y-H:i:s').'.csv'; 

        Excel::store(new Employees($result), 'employees/'.$name, 'public');

        return \Storage::disk('public')->url('employees/'.$name);
    }
}
