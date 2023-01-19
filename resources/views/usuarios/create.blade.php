@extends('adminlte::page')

@section('title', 'Crear Usuario • GML SOFTWARE')

@section('content')
<div class="card card-primary mt-4">
    <div class="card-header">
        <h3 class="card-title">Registrar Usuario</h3>
    </div>
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre del usuario" value="{{ old('nombre') }}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input required type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese el apellido de la Usuario" value="{{ old('apellido') }}">
            </div>
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input required type="number" name="cedula" class="form-control" id="cedula" placeholder="Ingrese cedula del usuario" value="{{ old('cedula') }}">
            </div>
            <div class="form-group">
                <label for="pais">Pais</label>
                <select required name="pais" class="form-control" id="pais" value="{{ old('pais') }}">
                    <option value="">--Seleccionar pais--</option>

                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Ingrese el email del usuario" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input required type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese la direccion del usuario" value="{{ old('direccion') }}">
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input required type="number" name="celular" class="form-control" id="celular" placeholder="Ingrese celular del usuario" value="{{ old('celular') }}">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select required name="id_categoria" class="form-control" id="id_categoria" value="{{ old('id_categoria') }}">
                    <option value="">--Seleccionar categoria--</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
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
    fetch('https://restcountries.com/v3.1/region/Americas')
        .then(response => response.json())
        .then(paises => {
            mostrar_paises(paises);
        });

    const select = document.querySelector("#pais");
    const mostrar_paises = (paises) => {
        for (let pais of paises) {
            select.innerHTML += `<option value="${pais.name.common}">${pais.name.common}</option>`;
        }
    }
</script>
@stop