@extends('adminlte::page')

@section('title', 'Correo del Admistrador')


@section('content_header')
<h1>Email del administrador</h1>
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Correo del administrador</h3>
            </div>
            <form action="{{route('admin.update', $admin->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="{{old('id',$admin->id)}}">
                        <label for="email">Email Administrador</label>
                        <input required type="text" name="email" class="form-control" id="email" placeholder="Ingrese el nombre de la categoria" value="{{old('email',$admin->email)}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

