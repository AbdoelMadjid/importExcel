<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Employees802 implements FromArray, WithHeadings
{
   protected $employees;
	protected $headings;

    public function __construct(array $employees)
    {
        $this->employees = $employees;
        
        $this->headings = [
        'Cedula',
        'Fecha inicio',
        'CC-nomina',
        'Importe',
        'Porcentaje',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return $this->employees;
    }

    public function headings() : array
    {
        return $this->headings;
    }
}
