@extends('adminlte::page')

@section('title', 'Editar usuario • GML SOFTWARE')

@section('content')
<div class="card card-primary mt-4">
    <div class="card-header">
        <h3 class="card-title">Editar usuario</h3>
    </div>
    <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
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
                <input type="hidden" name="id" id="id" value="{{ old('id',$usuario->id) }}">
                <label for="nombre">Nombre</label>
                <input required type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese el nombre de la Usuario" value="{{ old('nombre',$usuario->nombres) }}">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input required type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese el nombre de la Usuario" value="{{ old('apellido',$usuario->apellidos) }}">
            </div>
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input required type="number" name="cedula" class="form-control" id="cedula" placeholder="Ingrese cedula del usuario" value="{{ old('cedula',$usuario->cedula) }}">
            </div>
            <div class=" form-group">
                <label for="pais">Pais</label>
                <select required name="pais" class="form-control" id="pais" value="{{ old('pais',$usuario->pais) }}">
                    <option value="">--Seleccionar pais--</option>

                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Ingrese el nombre de la Usuario" value="{{ old('email',$usuario->email) }}">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input required type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese el nombre de la Usuario" value="{{ old('direccion',$usuario->direccion) }}">
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input required type="number" name="celular" class="form-control" id="celular" placeholder="Ingrese el nombre de la Usuario" value="{{ old('celular',$usuario->celular) }}">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select required name="id_categoria" class="form-control" id="id_categoria" value="{{ old('id_categoria',$usuario->id_categoria) }}">
                    <option value="">--Seleccionar categoria--</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{$categoria->id == $usuario->id_categoria ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                    @endforeach
                </select>
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
    document.addEventListener("DOMContentLoaded", function(event) {
        fetch('https://restcountries.com/v3.1/region/Americas')
            .then(response => response.json())
            .then(paises => {
                mostrar_paises(paises);
            });

        const select = document.querySelector("#pais");
        const pais_usuario = '{{$usuario->pais}}';
        const mostrar_paises = (paises) => {
            for (let pais of paises) {
                let selected = pais_usuario == pais.name.common ? 'selected' : '';
                select.innerHTML += `<option value="${pais.name.common}" ${selected}>${pais.name.common}</option>`;
            }
        }
    });
</script>
@stop