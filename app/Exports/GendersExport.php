<?php

namespace App\Exports;

use App\Genero;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GendersExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Genero::withTrashed()->get();
    }

    public function title(): string
    {
        return 'Géneros';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',            
            'Fecha de creación',
            'Última actualización',
            'Fecha de eliminación',
        ];
    }

}
