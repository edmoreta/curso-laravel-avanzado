@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios  
                    {{-- <a class="btn btn-primary" href="{{url('usuarios/create')}}" title="Nueva usuario" role="button">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a> --}}
                    <a title="Nuevo Usuario" data-toggle="modal" data-target="#modalCreate" 
                        href="#"                        
                        class="btn btn-primary btn-xs"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                </div>
                <div class="card-body">
                    @include('includes.messages')
                    @include('panel.usuarios.delete')
                    @include('panel.usuarios.create')
                    @include('panel.usuarios.edit')
                <div class="table-responsive">
                    {{$usuarios->links()}}
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Fecha creación</th>
                        <th scope="col">Última actualización</th>
                        <th scope="col">Rol</th>                        
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
                                <td>
                                    @foreach($usu->roles as $rol)
                                        {{$rol->display_name}}
                                    @endforeach    
                                </td>
                                <td>
                                    <a title="Ver" href="{{route('usuarios.show',$usu->id)}}" class="btn btn-info btn-xs"><i class="fa fa-folder-open" aria-hidden="true"></i></a>
                                    <a title="Cambiar rol" data-toggle="modal" data-target="#modalEdit" 
                                    data-name="{{$usu->name}}" data-email="{{$usu->email}}" 
                                    data-rol="{{count($usu->roles)== 0 ?: $usu->roles[0]->id}}" 
                                    href="#" data-action="{{route('usuarios.update',$usu->id)}}"
                                    class="btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                </td>                       
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
        // $('#modalDelete').on('show.bs.modal', function (event) {
        //     var button = $(event.relatedTarget);
        //     var action = button.data('action');
        //     var name = button.data('name');
        //     var modal = $(this);
        //     modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar la película <b>" + name + "</b>?");
        //     modal.find(".modal-content form").attr('action', action);
        // });
        $('#modalEdit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var action = button.data('action');
            var name = button.data('name');
            var email = button.data('email');
            var idRol = button.data('rol');
            var modal = $(this);
            modal.find(".modal-content #name").val(name);
            modal.find(".modal-content #email").val(email);
            modal.find(".modal-content #idRol").val(idRol);
            modal.find(".modal-content form").attr('action', action);
        });
    });
</script>
@endprepend
