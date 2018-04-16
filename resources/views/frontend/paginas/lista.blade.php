@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Páginas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
            <li class="active">
                <strong><a>Páginas</a></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <br><br>
            <a href="{{ route('crear_pagina') }}" class="btn btn-sm btn-primary">Nueva Página</a>        
        </div>        
    </div>
</div>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Páginas</h5>
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
                                <th>Estatus</th>
                                <th>Sección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista_paginas as $lp)
                            <tr class="gradeX">
                                <td>{{ $lp->id }}</td>
                                <td>{{ $lp->titulo }}</td>
                                <td>{{ $lp->seccion->nombre }}</td>
                                <td>
                                    @if($lp->activo!='I')
                                        <span class="label label-info">Activo</span>
                                    @else
                                        <span class="label label-warning">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-circle btn-xs btn-primary" href="{{ route('editar_pagina', $lp->id)}}"><i class="fa fa-pencil"></i></a>
                                    @if($lp->activo!='I')
                                        <a class="btn btn-circle btn-xs btn-warning" href="{{ route('desactivar_carrera', $lp->id)}}"><i class="fa fa-eye-slash"></i></a>
                                    @else
                                        <a class="btn btn-circle btn-xs btn-info" href="{{ route('activar_carrera', $lp->id)}}"><i class="fa fa-eye"></i></a>
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
            
            language: {
                lengthMenu: "_MENU_",
                search: "Buscar",
                zeroRecords: "Nada encontrado - lo siento",
                info: "Mostrando _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros encontrados",
                infoFiltered: "(filtrados de un total de _MAX_ registros)",
                paginate: {
                  previous: "Atrás",
                  next: "Siguiente"
                }
            },
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                
            ]
        });
    });
</script>
@endsection