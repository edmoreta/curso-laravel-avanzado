@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios  <a class="btn btn-primary" href="{{url('usuarios/create')}}" title="Nueva usuario" role="button">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </a></div>
                <div class="card-body">
                    @include('includes.messages')
                    @include('panel.usuarios.delete')
                <div class="table-responsive">
                    {{$usuarios->links()}}
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Fecha creación</th>
                        <th scope="col">Última actualización</th>                        
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usu)
                            <tr>
                                <th scope="row">{{$usu->name}}</th>
                                <td>{{$usu->email}}</td>
                                <td>{{$usu->created_at}}</td>     
                                <td>{{$usu->updated_at}}</td>                           
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{$usuarios->links()}}
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@prepend('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#modalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var name = button.data('name');
            var modal = $(this);
            modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar la película <b>" + name + "</b>?");
            modal.find(".modal-content form").attr('action', action);
        });
    });
</script>
@endprepend
