<?php

namespace App\Http\Controllers;

use PDF;
use Auth;

class ReporteController extends Controller
{
    public function testPDF() {
        $user = Auth::user();
        $reporte = PDF::loadView('reportes.test', compact('user'));
        $reporte = $reporte->stream('Reporte Test.pdf');
        return $reporte;
    }
}
