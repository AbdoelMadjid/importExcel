<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Employees implements FromArray, WithHeadings
{
	protected $employees;
	protected $headings;

    public function __construct(array $employees)
    {
        $this->employees = $employees;
        $this->headings = [
        'Cedula',
        'Nombre',
        'Fecha de Admision',
        'Cumpleaños',
        'Edad',
        'Sexo',
        'Costo',
        'Costo-Descripcion',
        'SAP',
        'SAP-Descripcion',
        'Puesto',
        'Puesto-Descripcion',
        'Ubicación',
        'Fecha de Afiliado',
        'Fecha de Desafiliado',        
        'Descripcion',
        'Afiliado',
        'Monto-802',
        'Monto-804',
        'Monto-806',
        'Monto-807',
        'Monto-808',
        'Memo',
        'Tipo',
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
