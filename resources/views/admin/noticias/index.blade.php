@extends('layouts.admin')

@section('titulo', 'Administración | Dashboard')
@section('titulo2', 'Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')


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
                    <h3 class="card-title">Lista de noticias</h3>
                </div>
                <div class="card-body">
                
                    <a href="{{ route('noticias.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"> Agregar noticia</i>
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Noticia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí van las noticias xd -->
                            @foreach($noticias as $noticia)
                                <tr>
                                    <td>{{ $noticia->titulo }}</td>
                                    <td>
                                        <a href="{{ route('noticias.show', $noticia->ID) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('noticias.edit', $noticia->ID) }}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$noticia->ID}})" 
                                            data-target="#DeleteModal" class="btn btn-danger"><i class="fas fa-times"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" ID="DeleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" ID="deleteForm" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Noticia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">¿Seguro que quieres eliminar la noticia: <b>"{{ $noticia->titulo }}"?</b></p>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sí, eliminar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@section('estilos')
@endsection
@section('scripts')
<script type="text/javascript">
    function deleteData(ID)
    {
        var ID = ID;
        var url = '{{ route("noticias.destroy", ":ID") }}';
        url = url.replace(':ID', ID);
        $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection