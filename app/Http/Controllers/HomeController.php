<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genero;
use App\Pelicula;
use App\Actor;

use App\Charts\PeliculaChart;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$generos = Genero::count();
        //$peliculas = Pelicula::count();
        //$actores = Actor::count();
        //return view('home', compact("generos", "peliculas", "actores"));

        $chart = new PeliculaChart;
        return view('home', compact("chart"));

    }
}
