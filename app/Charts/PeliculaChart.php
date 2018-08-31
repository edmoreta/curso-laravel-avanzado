<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Pelicula;
use DB;

class PeliculaChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->buildChart();
    }

    private function buildChart()
    {
        $peliculas = Pelicula::select('anio', DB::raw('count(*) as total'))->orderBy('anio')->groupBy('anio')->get();
        $this->dataset('Películas', 'bar', $peliculas->pluck('total'))->color('#2E2EFE');
        $this->labels($peliculas->pluck('anio'));
    }

}
