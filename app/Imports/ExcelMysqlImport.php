<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelMysqlImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($this->dateFormated($row[2]));

        return new Employee([
            'cedula'=>$row[0],
            'name'=>$row[1],
            'date_admission'=>$this->dateFormated($row[2]),            
            'birthday'=>$this->dateFormated($row[4]),
            'sex'=>$this->sexFormated($row[6]),
            'type'=>$row[7],
            'cost'=>$row[8],
            'cost_description'=>$row[9],
            'sap'=>$row[10],
            'sap_description'=>$row[11],
            'job'=>$row[12],
            'job_description'=>$row[13],
            'location'=>$row[14],
        ]);
    }

    public function dateFormated($var)
    {   
        $date = implode("-", array_reverse(explode("/", $var)));

        return $date.' ';
    }

    public function sexFormated($var)
    {   
        if ($var == "F") {
            return false;
        }

        if ($var == "M") {
            return true;
        }


    }
}
