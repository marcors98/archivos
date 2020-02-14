@extends('layouts.admin')

@section('titulo', 'Administración | Crear noticia')
@section('titulo2', 'Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')


<a class="btn btn-primary btn-sm" 
    style="margin-left: 8px; margin-bottom: 15px;" 
    href="{{ route('noticias.index') }}">
    
    <i class="fas fa-arrow-left"></i> 
    Volver a lista de noticias</a>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear noticia</h3>
                </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="{{ route('noticias.store') }}">

                        @csrf
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="txtTitulo" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Imagen de portada</label>
                            <input type="file" name="imgPortada" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Cuerpo</label>
                            <textarea name="txtCuerpo" ID="" cols="30" rows="10" class="form-control"></textarea>
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