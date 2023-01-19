@extends('adminlte::page')

@section('title', 'Usuario • GML SOFTWARE')

@section('content_header')
<h1>Usuario</h1>
@stop

@section('content')
@if (Session::has('message'))
<div class="alert alert-{{Session::get('type')}}">
    {{Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="/usuario/create" class="btn btn-primary">Crear Usuario</a>
                </h3>

            </div>

            <div class="card-body table-responsive p-0">
                <form class="form-inline p-4 float-rigth" action="{{route('usuario.index')}}" method="GET">                    
                    <div class="form-group">
                        <input type="text" class="form-control btn-lg" id="buscar" name="buscar" placeholder="Buscar usuario" >
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Buscar</button>
                </form>
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Cedula</th>
                            <th>Pais</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Categoria</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->nombres . ' ' . $usuario->apellidos}}</td>
                            <td>{{$usuario->cedula}}</td>
                            <td>{{$usuario->pais}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->direccion}}</td>
                            <td>{{$usuario->celular}}</td>
                            <td>{{isset($usuario->categoria->nombre) ? $usuario->categoria->nombre : 'SIN CATEGORIA'}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-primary">Editar</a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#usuario-{{$usuario->id}}">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @include('usuarios.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop