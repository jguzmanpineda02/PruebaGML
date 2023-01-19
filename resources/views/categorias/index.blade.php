@extends('adminlte::page')

@section('title', 'Categorias • GML SOFTWARE')

@section('content_header')
<h1>Categorias</h1>
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
                    <a href="/categoria/create" class="btn btn-primary">Crear categoria</a>
                </h3>

            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de categoria</th>
                            <th>Fecha de creación</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nombre}}</td>
                            <td>{{ date_format($categoria->created_at, 'd-m-Y')}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('categoria.edit', $categoria) }}" class="btn btn-primary">Editar</a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#categoria-{{$categoria->id}}">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @include('categorias.delete')
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