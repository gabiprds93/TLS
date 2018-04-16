@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Egresado</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_egresados') }}">Lista de Egresados</a>
            </li>
            <li class="active">
                <strong><a>Editar Egresado</a></strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Editar Egresado</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_egresado', $egresado], 'method' => 'PUT']) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Nombres</label> 
                            {!! Form::text('nombre', $egresado->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Carrera</label> 
                            {!! Form::select('id_carrera', $lista_carreras, $egresado->id_carrera, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Twitter</label> 
                            {!! Form::text('twitter', $egresado->twitter, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group"><label>Linkedin</label> 
                            {!! Form::text('linkedin', $egresado->linkedin, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Quote</label> 
                            {!! Form::text('quote', $egresado->quote, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Descripción</label> 
                        {!! Form::textarea('descripcion', $egresado->descripcion, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4">
                        <label>Pie de Contenido</label> 
                        {!! Form::textarea('pie_contenido', $egresado->pie_contenido, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-sm-4">
                        <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-imagen">Agregar Imagen</a>
                        <ul class="list-group clear-list m-t" id="listaImagen">
                            @foreach($egresado->imagenes as $img)
                            <li class='list-group-item' id='imagenlist-{{$img->id}}'>
                                <span class='pull-right'>
                                    <button class='btn btn-xs btn-primary'>
                                        <i class='fa fa-pencil' data-campo="imagen" data-item-id='{{$img->id}}' id='editaImagen'></i>
                                    </button> 
                                    <button class='btn btn-xs btn-danger'>
                                        <i class='fa fa-trash' data-item-id='{{$img->id}}' data-campo='imagen' data-num='{{$img->id}}' id='eliminaItem'></i>
                                    </button>
                                </span>
                                <span id='titShow'>{{$img->id}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_egresados') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Formulario de Agregar Imagen-->
<div id="modal-add-imagen" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-add-imagen" id="form-add-imagen" data-modname="modal-add-imagen" enctype="multipart/form-data" method="POST">
                            <div class="form-group"><label>Agregar Imágen</label> 
                                <input name="imagen" id="imagen" type="file" />
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="imagen">
                            <input type="hidden" class="form-control" id="id_egresado" name="id_egresado" value="{{$egresado->id}}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Registrar Imagen">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Imagen-->
<!--Formulario de Editar Imagen-->
<div id="modal-form-edit-imagen" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-edit-imagen" id="form-edit-imagen" data-modname="modal-form-edit-imagen" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="itemId" name="itemId">
                            <div class="form-group"><label>Editar Imágen</label> 
                                <input name="editImagenModal" id="editImagenModal" type="file" />
                            </div>
                            <div class="form-group" id="imgDiv"></div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="imagen">
                            <input type="hidden" class="form-control" id="id_egresado" name="id_egresado" value="{{$egresado->id}}">
                            <div class="form-group">
                                <button class="btn btn-primary" id="editarSlider">Editar Imagen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Imagen-->
@endsection

@section('ultimos-scripts')
<!-- SUMMERNOTE -->
<script src="{{ asset('js/plugins/tinymce/tinymce.min.js') }}"></script>
<!-- Toastr script -->
<script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>
<script>

tinymce.init({ 
    selector:'textarea',
    entity_encoding: 'raw',
    relative_urls: false,
    remove_script_host: false,
    plugins: [
        'advlist autolink lists link charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    spellchecker_language: 'es',
    spellchecker_languages: 'Spanish=es,English=en',
    image_advtab: true
    });

    //Funcion para guardar imagen
    $('#form-add-imagen').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/egresados/guardar_item',
            type: 'POST',              
            data: formData,
            processData:false,
            contentType:false,
            cache:false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data)
            {
                switch(data) {
                        case '0':
                            toastr.clear();
                            toastr.error("Todos los campos son obligatorios", "TOULOUSE");
                            break;
                        default:
                            toastr.clear();
                            //toastr.success("Se ha registrado el item exitosamente", "TOULOUSE");
                            //Vacio los campos
                            $('#form-add-imagen')[0].reset();
                            //Cierra el modal
                            
                            var $item = $( "<li class='list-group-item' id='imagenlist-" +data.trim()+ "'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-campo='imagen' data-item-id='" +data.trim()+ "' id='editaImagen'></i></button> <button class='btn btn-xs btn-danger'><i class='fa fa-trash' data-item-id='" +data.trim()+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + data.trim() + "</span></li>" );
                            //Agregar item a la lista
                            $("#listaImagen").append($item);

                            $('#'+modalName).modal('toggle');
                            
                            break;
                    }
            },
            error: function(data)
            {
                console.log(data);
            }
        });
    });  
    //Funcion para guardar imagen

    //Funcion para obtener imagen a editar
    $(document).on('click', '#editaImagen', function(e) {
        e.preventDefault();
        var a = $(this).data('item-id');
        var campo = $(this).data('campo');

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/egresados/obtener_item/'+campo+'/'+a,  
            type: 'GET',
            cache: false,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data){
                switch(data) {
                    case '0':
                        toastr.clear();
                        toastr.error("No se ha podido obtener datos del ítem a editar", "TOULOUSE");
                        break;
                    default:
                        toastr.clear();
                        $( "#itemId" ).val(data['id']);
                        var htmlImg = $('<img id="imgModalShow" src="{{ URL::to('/') }}/img/egresados/'+data['imagen']+'" style="width:100%;">');
                        htmlImg.appendTo('#imgDiv');

                        $('#modal-form-edit-imagen').modal('show');
                        break;
                }
            },
            //si ha ocurrido un error
            error: function(e){
                toastr.clear();
                toastr.error("Ha ocurrido un error al intentar editar el ítem.", "TOULOUSE");
            }
        });
        
    });
    //Funcion para obtener imagen a editar

    //Funcion para guardar o procesar el slider
    $('#form-edit-imagen').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/egresados/editar_item',
            type: 'POST',              
            data: formData,
            processData:false,
            contentType:false,
            cache:false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(data)
            {
                switch(data) {
                        case '0':
                            toastr.clear();
                            toastr.error("Todos los campos son obligatorios", "TOULOUSE");
                            break;
                        default:
                            toastr.clear();
                            //toastr.success("Se ha registrado el item exitosamente", "TOULOUSE");
                            //Vacio foto
                            $('#imgModalShow').remove();
                            //Cierra el modal
                            $('#'+modalName).modal('toggle');
                            break;
                    }
            },
            error: function(data)
            {
                console.log(data);
            }
        });
    });  
    //Funcion para guardar o procesar el slider

</script>
@endsection