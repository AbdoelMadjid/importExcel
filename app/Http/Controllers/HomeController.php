<?php

namespace App\Http\Controllers;

use App\Employee;
use Carbon\Carbon;
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
        
        $employees = Employee::all();

        $employeesOld = [];

        $menor_20 = 0;
        $r20_29 = 0;
        $r30_39 = 0;
        $r40_49 = 0;
        $r50_59 = 0;
        $r60_69 = 0;
        $r70_79 = 0;
        $r80_89 = 0;
        $r90_99 = 0;

        foreach($employees as $employe){

            $age = Carbon::parse($employe->birthday)->age;

            if ($age < 20) {
                $menor_20++;
            }

            if ($age >= 20 && $age <= 29) {
                $r20_29++;
            }

            if ($age >= 30 && $age <= 39) {
                $r30_39++;
            }

            if ($age >= 40 && $age <= 49) {
                $r40_49++;
            }

            if ($age >= 50 && $age <= 59) {
                $r50_59++;
            }

            if ($age >= 60 && $age <= 69) {
                $r60_69++;
            }
            
            if ($age >= 70 && $age <= 79) {
                $r70_79++;
            }

            if ($age >= 80 && $age <= 89) {
                $r80_89++;
            }

            if ($age >= 90 && $age <= 99) {
                $r90_29++;
            }

        }

        $employeesOld=[
            $menor_20,
            $r20_29,
            $r30_39,
            $r40_49,
            $r50_59,
            $r60_69,
            $r70_79,
            $r80_89,
            $r90_99,
        ];

       
        

        return view('home',[
            'employess_info'=>$employess_info,
            'f'=>$f,
            'm'=>$m,
            'o'=>$o,
            'total'=>$total,
            'employeesOld'=>$employeesOld,
        ]);
    }
}
