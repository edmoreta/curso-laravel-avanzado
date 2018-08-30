<?php

namespace App\Exports;

use App\Pelicula;
use App\Genero;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;

class MoviesPerGenderSheet implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithMapping
{
    private $gender;

    public function __construct($gender)
    {
        $this->gender = $gender;
    }

    public function collection()
    {                
        return Pelicula::whereHas('generos', function ($query) {
            $query->where('nombre', $this->gender->nombre );
            })->get();
        
        //return $this->genero->peliculas()->orderBy('titulo')->get();
    }

    public function map($pelicula): array
    {
        return [
            $pelicula->idPelicula,
            $pelicula->titulo,
            $pelicula->duracion,
            $pelicula->anio,
        ];
    }

    public function title(): string
    {
        return '' . $this->gender->nombre;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Título',
            'Duración',
            'Año',
        ];
    }

}
