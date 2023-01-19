@extends('adminlte::page')

@section('title', 'Crear Categoria • GML SOFTWARE')

@section('content')
<div class="card card-primary mt-4">
    <div class="card-header">
        <h3 class="card-title">Registrar Categoria</h3>
    </div>
    <form action="{{ route('categoria.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre categoria</label>
                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de la categoria">
            </div>     
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
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