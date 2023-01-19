@extends('adminlte::page')

@section('title', 'Inicio • GML SOFTWARE')

@section('content_header')
<h1>GML SOFTWARE</h1>
@stop

@section('content')
<div class="callout callout-success">
    <h5><b>Decripción</b></h5>
    <p>Prueba tecnica realizada en laravel 9 con la versión 8 de php, usando el motor de platillas Blade, propio del framework.</p>
    <p>Se utiliza una plantilla integrada llamada AdminLTE, para tenero un optimo manejo de las vistas.</p>
    <p>El servicio de API REST de los paises se consume con JavaScript nativo.</p>
    <p>El servidor de correo esta configirado en MailJet. un servicio gratuito hasta cierto limite.</p>
    <h5><b>Modulos</b></h5>
    <p><b>Inicio:</b> Descripcion general del sistema.</p>
    <p><b>Usuarios:</b> CRUD de usuarios. Posee un buscador por el cual se puede buscar por cualquier datos de un usuario</p>
    <p><b>Categorias:</b> CRUD de categorias(ya tiene datos por defecto).</p>
    <p><b>Parametros:</b> Configuracion del email del administrador del sistema, con el mismo se inicia sesión(para tener en cuenta).</p>
    <h5><b>Nota</b></h5>
    <p>A peticion de la prueba solo tiene un usuario registrado con el cual se realiza el inicio se sesión.</p>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop