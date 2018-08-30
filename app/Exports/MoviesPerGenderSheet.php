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
        
        // if (count($this->gender->peliculas) > 0) {
        //     $peliculas = Pelicula::with(['generos' => function ($query) {
        //         $query->select('nombre')->where('nombre', $this->gender->nombre);
        //         }])->get(['idPelicula','titulo','duracion','anio']);
        // } else {
        //     $peliculas = Pelicula::all();
        // }       
        //return $peliculas;     
        
        //$generos = Genero::with('peliculas')->where('generos.idGenero',  $this->gender->idGenero)->get();

        //return Genero::find($this->gender->idGenero)->peliculas();

        return Pelicula::whereHas('generos', function ($query) {
            $query->where('nombre', $this->gender->nombre );
            })->get();

        /*
        return Genero::with(['peliculas' => function ($query) {
            $query->select('peliculas.idPelicula','titulo','duracion','anio');
            }])->where('nombre', $this->gender->nombre)->get();
        */
        
        //return $this->gender::with('peliculas')->get();

        //return Genero::with('peliculas')->get();
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
