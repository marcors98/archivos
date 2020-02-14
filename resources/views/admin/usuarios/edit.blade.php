@extends('layouts.admin')

@section('titulo', 'Administración | Editar usuario')
@section('titulo2', 'Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')


<a class="btn btn-primary btn-sm" 
    style="margin-left: 8px; margin-bottom: 15px;" 
    href="{{ route('usuarios.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de usuarios</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar usuario: {{ $usuario->id }}</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" value="{{ $usuario->name }}" name="txtName" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" value="{{ $usuario->email }}" name="txtEmail" class="form-control" readonly/>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <input id="password" type="password" name="txtPassword" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <input id="confirm_password" type="password" name="txtPassword" class="form-control"/>
                        </div>

                        <div class="form-group"> 
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('estilos')
@endsection
@section('scripts')
@endsection