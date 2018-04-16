@extends('frontend.layouts.app')

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de Usuarios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
            <li class="active">
                <strong><a>Lista de Usuarios</a></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <br><br>
            <a class="btn btn-sm btn-primary" href="{{ route('nuevo_usuario') }}">Nuevo Usuario</a>
        </div>
        
    </div>
</div>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Usuarios</h5>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo Electronico</th>
                                <th>Rol de Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="gradeX">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 4.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">4</td>
                            </tr>
                            <tr class="gradeC">
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td class="center">5</td>
                            </tr>
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