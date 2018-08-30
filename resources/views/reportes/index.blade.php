@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">@lang('messages.reports')</div>

                <div class="card-body">                    
                    <a title="Ver Reporte Usuarios PDF" target="_blank" href="{{route('reportes.usuarios')}}" class="btn btn-info btn-xs"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Usuarios </a>
                    <a title="Ver Reporte Usuarios Excel" href="{{route('reportes.usuarios.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Usuarios </a>
                    <a title="Ver Reporte Géneros Excel" href="{{route('reportes.generos.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Géneros </a>
                    <a title="Ver Reporte Películas Excel" href="{{route('reportes.peliculas.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Películas por Año </a>
                    <a title="Ver Reporte Películas Excel" href="{{route('reportes.movies.excel')}}" class="btn btn-info btn-xs"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Películas por Género </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
