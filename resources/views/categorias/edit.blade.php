@extends('adminlte::page')

@section('title', 'Editar Categoria • GML SOFTWARE')

@section('content')
<div class="card card-primary mt-4">
    <div class="card-header">
        <h3 class="card-title">Editar Categoria</h3>
    </div>
    <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')       
        <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre categoria</label>
                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de la categoria" value="{{$categoria->nombre}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
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