<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\User;
use App\Exports\UsersExport;
use App\Exports\GendersExport;
use App\Exports\PeliculasExport;
use App\Exports\MoviesExport;
use Excel;

class ReporteController extends Controller
{

    public function index(){
        return view('reportes.index');
    }

    public function reporteUsuarios() {
        //$user = Auth::user();
        $usuarios = User::with('roles')->orderBy('name')->get();
        $reporte = PDF::loadView('reportes.usuarios', compact('usuarios'));
        $reporte = $reporte->stream('Reporte-Usuarios.pdf');
        return $reporte;
    }

    public function reporteUsuariosExcel(){
        return Excel::download(new UsersExport, 'reporte-usuarios.xlsx');
    }

    public function reporteGenerosExcel(){
        return Excel::download(new GendersExport, 'reporte-generos.xlsx');
    }

    public function reportePeliculasPorAnioExcel(){
        return Excel::download(new PeliculasExport, 'reporte-peliculas-anio.xlsx');
    }
    
    public function reportePeliculasPorGeneroExcel(){
        return Excel::download(new MoviesExport, 'reporte-peliculas-genero.xlsx');
    }
}
