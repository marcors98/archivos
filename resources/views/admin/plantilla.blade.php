@extends('layouts.admin')

@section('titulo', 'Administración | Dashboard')
@section('titulo2', 'Texto del título')

@section('breadcrumbs')
@endsection

@section('contenido')
    @if(Session::has('exito'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
        {{ Session::get('exito') }}
    </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ¡Error!</h5>
        {{ Session::get('error') }}
    </div>
    @endif
<p>Aqui va el contenido</p>
@endsection

@section('estilos')
@endsection
@section('scripts')
@endsection