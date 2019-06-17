<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('end_date','>=',Carbon::now())->get();

        return view('events.index',[
            'events'=>$events,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        Event::create([
            'title'=>$request->input('name'), 
            'start_date'=>$request->input('start_date'), 
            'end_date'=>$request->input('end_date'),
        ]);

        return redirect()->route('event.administrator.index')->with('success','Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::where('id',$id)->first();

        if (!$event) {
            
            return abort(404);
        }

        return view('events.edit',[
            'event'=>$event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        Event::where('id',$id)->update([
            'title'=>$request->input('name'), 
            'start_date'=>$request->input('start_date'), 
            'end_date'=>$request->input('end_date'),
        ]);

        return redirect()->route('event.administrator.index')->with('success','Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id',$id)->delete();

        return redirect()->route('event.administrator.index')->with('success','Eliminado con exito');
    }
}
