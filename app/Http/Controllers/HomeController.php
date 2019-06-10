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
        $total = 0;
        $f = 0;
        $m = 0;
        $o = 0;
        foreach($employess_info as $employee)
        {
            $total = $total + $employee->total;
        }

        if (isset($employess_info[0])) {
            $f = $employess_info[0]->total;
        }

        if (isset($employess_info[1])) {
            $m = $employess_info[1]->total;
        }

        if (isset($employess_info[2])) {
            $o = $employess_info[2]->total;
        }
        
        return view('home',[
            'employess_info'=>$employess_info,
            'f'=>$f,
            'm'=>$m,
            'o'=>$o,
            'total'=>$total,
        ]);
    }
}
