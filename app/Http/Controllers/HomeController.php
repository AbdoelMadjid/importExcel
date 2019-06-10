<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employess_info = Employee::groupBy('sex_id')->select('sex_id', DB::raw('count(*) as total'))->get();

        //dd($employess_info);
        
        return view('home',[
            'employess_info'=>$employess_info,
        ]);
    }
}
