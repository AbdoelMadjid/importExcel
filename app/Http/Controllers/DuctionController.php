<?php

namespace App\Http\Controllers;

use App\Duction;
use App\Employee;
use Illuminate\Http\Request;

class DuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with(['sex','ductions'])->get();

        //dd(Carbon::parse($employees->first()->birthday)->age);

        //dd($employees->where('id',15)->first()->ductions->where('description','802')->first()->pivot->import);

        return view('ductions.index',[
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Duction  $duction
     * @return \Illuminate\Http\Response
     */
    public function show($description)
    {
        $duction = Duction::where('description',$description)->first();

        if (!$duction) {
            return abort(404);
        }

        return view('ductions.show',[
            'duction'=>$duction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Duction  $duction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::with('ductions')->where('id',$id)->first();

        $ductions =Duction::all();

        if (!$employee) {
            return abort(404);
        }

        return view('ductions.edit',[
            'employee'=>$employee,
            'ductions'=>$ductions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Duction  $duction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'ductions'=>'array',
            'import'=>'array',
            'ductions.*'=>'numeric',
            'start_date'=>'date|required',

        ]);

        $values = [];

        if (!empty($request->input('ductions'))) {
            
            foreach ($request->input('ductions') as $key => $duction) {
            
                $values[$duction] = ['import'=>$request->input('import')[$key],]; 
            }


        }
        $employee = Employee::with('ductions')->where('id',$id)->first();

        if (!$employee) {
            return abort(404);
        }

        $employee->ductions()->sync($values);

        $employee->update([
            'start_date'=>$request->input('start_date'),
            'porcentages'=>isset($values[1]['import']) ? $values[1]['import'] : 1,
        ]);

        return redirect()->route('ductions.index')->with('success','Editado con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Duction  $duction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duction $duction)
    {
        //
    }

    public function massiveUpdate($id,Request $request)
    {
        $duction = Duction::where('id',$id)->first();

        if (!$duction) {
            return abort(404);
        }

        if ($duction->description == "802") {
            
            $request->validate([
                'porcentaje'=>['required','numeric','max:100','min:1'],
            ]);

            Employee::whereHas('ductions',function($q){
                        $q->where('description','802');
                    })
                    ->update([
                        'porcentages'=>$request->input('porcentaje'),
                    ]);

        }

        else{

            $request->validate([
                'import'=>['required','numeric'],
            ]);

            $employees = Employee::with('ductions')->whereHas('ductions',function($q) use ($duction){
                        $q->where('description',$duction->description);
                    })->get();

            //dd($employees);

            foreach ($employees as $employee) {
                
                $employee->ductions()->detach($duction->id);

                $values[$duction->id] = ['import'=>$request->input('import')];
                
                $employee->ductions()->attach($values);
            }


        }

        return redirect()->route('ductions.index');
        
    } 

    public function changeDateEdit()
    {
        return view('ductions.editdate');
    }

    public function changeDateUpdate(Request $request)
    {
        $request->validate([
            'date'=>'required|date',
        ]);

        Employee::where('id','>=',0)->update([
            'start_date'=>$request->input('date'),
        ]);

        return redirect()->route('ductions.index');
        
    }
}
