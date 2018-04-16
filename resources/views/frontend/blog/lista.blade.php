@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li class="active">
                <strong><a>Blog</a></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <br><br>
            <a href="{{ route('crear_articulo') }}" class="btn btn-sm btn-primary">Nuevo Artículo</a>        
        </div>        
    </div>
</div>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Artículos</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Url</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista_articulos as $la)
                            <tr class="gradeX">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $la->titulo }}</td>
                                <td><a target="_blank" href="{{ URL::to('/') }}/blog/{{$la->id}}/{{$la->slug}}">{{ URL::to('/') }}/blog/{{$la->id}}/{{$la->slug}}</a></td>
                                <td>{{ date("d-m-Y", strtotime($la->created_at))}}</td>
                                <td>{{ date("H:i", strtotime($la->created_at))}}</td>
                                <td>
                                    @if($la->activo!='I')
                                        <span class="label label-info">Activo</span>
                                    @else
                                        <span class="label label-warning">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-circle btn-xs btn-primary" href="{{ route('editar_articulo', $la->id)}}"><i class="fa fa-pencil"></i></a>
                                    @if($la->activo!='I')
                                        <a class="btn btn-circle btn-xs btn-warning" href="{{ route('desactivar_articulo', $la->id)}}"><i class="fa fa-eye-slash"></i></a>
                                    @else
                                        <a class="btn btn-circle btn-xs btn-info" href="{{ route('activar_articulo', $la->id)}}"><i class="fa fa-eye"></i></a>
                                    @endif
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
@endsection

@section('ultimos-scripts')
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
            ]

        });

    });

</script>
@endsection