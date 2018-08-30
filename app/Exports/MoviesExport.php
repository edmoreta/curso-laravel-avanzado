<?php

namespace App\Exports;

use App\Pelicula;
use App\Genero;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MoviesExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $genders = Genero::groupBy('nombre')->orderBy('nombre')->has('peliculas','>',0)->get(['nombre']);
        //$genders = Genero::has('peliculas')->get();

        $sheets = [];
        
        foreach ($genders as $g) {   
            //if (count($g->peliculas) > 0) {                     
                $sheets[] = new MoviesPerGenderSheet($g);
            //}
        }        
        return $sheets;
    }
}
