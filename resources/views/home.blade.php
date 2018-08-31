@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    {{-- <div class="alert alert-success" role="alert">
                        <b>Películas:</b> {{$peliculas}}
                    </div>
                    <div class="alert alert-success" role="alert">
                        <b>Géneros:</b> {{$generos}}
                    </div>
                    <div class="alert alert-success" role="alert">
                        <b>Actores:</b> {{$actores}}
                    </div> --}}

                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
{!! $chart->script() !!}
@endpush

