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
    public function show(Duction $duction)
    {
        //
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
}
