@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Carrera Profesional</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_carreras') }}">Lista de Carreras</a>
            </li>
            <li class="active">
                <strong><a>Editar Carrera Profesional</a></strong>
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
                <h5>Editar Carrera</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_carrera', $carrera], 'method' => 'PUT', 'files' => true]) !!}

                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Nombre</label> 
                            {!! Form::text('nombre',$carrera->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Mundo</label> 
                            {!! Form::select('id_mundo', $lista_mundos, $carrera->id_mundo, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Tiempo Total</label> 
                            {!! Form::text('tiempo_total',$carrera->tiempo_total,  ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Variación de Tiempo</label> 
                            {!! Form::text('variacion_tiempo',$carrera->variacion_tiempo,  ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                         <div class="form-group"><label>Orden</label> 
                            {!! Form::text('orden',$carrera->orden,  ['class'=>'form-control','required']) !!}
                        </div>   
                    </div>   
                </div>
                <div class="hr-line-dashed"></div>
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Descripción</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">
                        Sliders</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Contenido</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Módulos</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-5" aria-expanded="false">Multimedia</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-6" aria-expanded="false">Estilos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                {!! Form::textarea('descripcion_carrera', $carrera->descripcion_carrera, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-slider">Agregar Slide</a>

                                <ul class="list-group clear-list m-t" id="listaSliders">
                                    @foreach($carrera->sliders as $sld)
                                    <li class='list-group-item' id='sliderlist-{{$sld->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-campo="slider" data-item-id='{{$sld->id}}' id='editaSlider'></i>
                                            </button> 
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$sld->id}}' data-campo='slider' data-num='{{$sld->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='titShow'>{{$sld->titulo}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#cont-1" aria-expanded="true">Certificaciones</a></li>
                                        <li class=""><a data-toggle="tab" href="#cont-2" aria-expanded="false">
                                        ¿Que Ofrecemos?</a></li>
                                        <li class=""><a data-toggle="tab" href="#cont-3" aria-expanded="false">Talento</a></li>
                                        <li class=""><a data-toggle="tab" href="#cont-4" aria-expanded="false">Nosotros</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="cont-1" class="tab-pane active">
                                            <div class="panel-body">
                                                {!! Form::textarea('certificaciones', $carrera->certificaciones, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div id="cont-2" class="tab-pane">
                                            <div class="panel-body">
                                                {!! Form::textarea('ofrecemos', $carrera->ofrecemos, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div id="cont-3" class="tab-pane">
                                            <div class="panel-body">
                                                {!! Form::textarea('talento', $carrera->talento, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                        <div id="cont-4" class="tab-pane">
                                            <div class="panel-body">
                                                {!! Form::textarea('nosotros', $carrera->nosotros, ['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-modulo">Agregar Módulo</a>
                                <ul class="list-group clear-list m-t" id="listaModulos">
                                    @foreach($carrera->modulos as $mod)
                                    <li class='list-group-item' id='modulolist-{{$mod->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-campo="modulo" data-item-id='{{$mod->id}}' id='editaModulo'></i>
                                            </button> 
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$mod->id}}' data-campo='slider' data-num='{{$mod->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='titShow'>{{$mod->nombre}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Imagen Referencial</label>
                                        {!! Form::file('imagen_referencial'); !!} 
                                        <br>
                                        <img style="width: 100%;" src="{{ URL::to('/') }}/img/carreras/{{$carrera->imagen_referencial}}" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Imagen Principal</label> 
                                        {!! Form::file('img'); !!}
                                        @if($carrera->img)
                                            <br>
                                            <img style="width: 100%;" src="{{ URL::to('/') }}/img/carreras/{{$carrera->img}}" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Video Principal</label> 
                                        {!! Form::text('video',  $carrera->video, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-6" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Color de Fondo (Slide Home)</label> 
                                        {!! Form::text('color', $carrera->color, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                    <div class="form-group"><label>Color de Fondo Móvil (Home)</label> 
                                        {!! Form::text('color_mobile', $carrera->color_mobile, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Color de Titulo (Slide Home)</label> 
                                        {!! Form::text('color_titulo_slide', $carrera->color_titulo_slide, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                    <div class="form-group"><label>Color de Link (Slide Home)</label> 
                                        {!! Form::text('color_link_slide', $carrera->color_link_slide, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Color de Línea (Interna)</label> 
                                        {!! Form::text('color_linea_contenido', $carrera->color_linea_contenido, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                    <div class="form-group"><label>Color de Fuente (Interna)</label> 
                                        {!! Form::text('color_fuente', $carrera->color_fuente, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>

                <a href="{{ route('lista_carreras') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Formulario de Agregar Slider-->
<div id="modal-add-slider" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-add-slider" id="form-add-slider" data-modname="modal-add-slider" enctype="multipart/form-data" method="POST">
                            <div class="form-group"><label>Agregar Imágen</label> 
                                <input name="imagen" data-nombre="imagen" id="imagen" type="file" />
                            </div>
                            <div class="form-group"><label>Título</label> 
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="form-group"><label>Subtítulo</label> 
                                <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                            </div>
                            <div class="form-group"><label>Texto Corto</label>
                                <textarea class="form-control" id="texto_corto" name="texto_corto"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="slider">
                            <input type="hidden" class="form-control" id="id_carrera" name="id_carrera" value="{{$carrera->id}}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear Slide">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Slider-->

<!--Formulario de Agregar Modulo-->
<div id="modal-add-modulo" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-add-modulo" id="form-add-modulo" data-modname="modal-add-modulo" method="POST" >
                            <div class="form-group"><label>Nombre de Módulo</label> 
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group"><label>Contenido</label>
                                <textarea class="form-control" id="contenido" name="contenido"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="modulo">
                            <input type="hidden" class="form-control" id="id_carrera" name="id_carrera" value="{{$carrera->id}}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear Módulo">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Modulo-->

<!--Formulario de Editar Slider-->
<div id="modal-form-edit-slider" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-edit-slider" id="form-edit-slider" data-modname="modal-form-edit-slider" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="itemId" name="itemId">
                            <div class="form-group"><label>Editar Imágen</label> 
                                <input name="editImagenModal" id="editImagenModal" type="file" />
                            </div>
                            <div class="form-group" id="imgDiv"></div>
                            <div class="form-group"><label>Título</label> 
                                <input type="text" class="form-control" id="editTituloModal" name="editTituloModal">
                            </div>
                            <div class="form-group"><label>Subtítulo</label> 
                                <input type="text" class="form-control" id="editSubtituloModal" name="editSubtituloModal">
                            </div>
                            <div class="form-group"><label>Texto Corto</label>
                                <textarea class="form-control" id="editTexto_cortoModal" name="editTexto_cortoModal"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="slider">
                            <input type="hidden" class="form-control" id="id_carrera" name="id_carrera" value="{{$carrera->id}}">
                            <div class="form-group">
                                <button class="btn btn-primary" id="editarSlider">Editar Slider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Slider-->
<!--Formulario de Editar Modulo-->
<div id="modal-form-edit-modulo" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-edit-modulo" id="form-edit-modulo" data-modname="modal-form-edit-modulo" method="POST" >
                            <input type="hidden" id="modId" name="modId">
                            <div class="form-group"><label>Nombre de Módulo</label> 
                                <input type="text" class="form-control" id="editNombreModal" name="editNombreModal">
                            </div>
                            <div class="form-group"><label>Contenido</label>
                                <textarea class="form-control" id="editContenidoModal" name="editContenidoModal"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="modulo">
                            <input type="hidden" class="form-control" id="id_carrera" name="id_carrera" value="{{$carrera->id}}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear Módulo">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Modulo-->


<!--Modal para eliminar Item-->
<div id="modal-eliminar-item" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-delete-item" id="delete_item" method="POST">
                            <div class="form-group"><label>Eliminar Ítem</label> 
                                <input type="hidden" name="listNum" id="listNum"/>
                                <input type="hidden" name="campo" id="campoDel"/>
                                <input type="hidden" name="id" id="idDel"/>
                            </div>
                            <p>¿Estas seguro de eliminar este ítem de forma definitiva? esta acción no podrá deshacerse.</p>
                            <div class="form-group">
                                <button data-dismiss="modal" class="btn btn-white" type="submit">Cancelar</button>
                                <button class="btn btn-primary" id="deleteItem">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal para eliminar Item-->

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

$(document).ready(function() {

    //Funcion para guardar o procesar el slider
    $('#form-add-slider').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/guardar_item',
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
                            toastr.success("Se ha registrado el item exitosamente", "TOULOUSE");
                            //Vacio los campos
                            $('#form-add-slider')[0].reset();
                            //Cierra el modal
                            var $item = $( "<li class='list-group-item' id='sliderlist-" +data.trim()+ "'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-campo='slider' data-item-id='" +data.trim()+ "' id='editaSlider'></i></button> <button class='btn btn-xs btn-danger'><i class='fa fa-trash' data-item-id='" +data.trim()+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + formData.get("titulo") + "</span></li>" );
                            //Agregar item a la lista
                            $("#listaSliders").append($item);

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
    //Funcion para guardar o procesar el modulo
    $('#form-add-modulo').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/guardar_item',
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
                            toastr.success("Se ha registrado el item exitosamente", "TOULOUSE");
                            //Vacio los campos
                            $('#form-add-modulo')[0].reset();

                            var $item = $( "<li class='list-group-item' id='modulolist-" +data.trim()+ "'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-campo='modulo' data-item-id='" +data.trim()+ "' id='editaModulo'></i></button> <button class='btn btn-xs btn-danger'><i class='fa fa-trash' data-item-id='" +data.trim()+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + formData.get("nombre") + "</span></li>" );
                            //Agregar item a la lista
                            $("#listaModulos").append($item);
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
    //Funcion para guardar o procesar el modulo

    //Funcion para obtener slider de la lista
    $(document).on('click', '#editaSlider', function(e) {
        e.preventDefault();
        var a = $(this).data('item-id');
        var campo = $(this).data('campo');

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/obtener_item/'+campo+'/'+a,  
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
                        $( "#editTituloModal" ).val(data['titulo']);
                        $( "#editSubtituloModal" ).val(data['subtitulo']);
                        tinyMCE.get('editTexto_cortoModal').setContent(data['texto_corto']);
                        var htmlImg = $('<img id="imgModalShow" src="{{ URL::to('/') }}/img/carreras/'+data['imagen']+'" style="width:100%;">');
                        htmlImg.appendTo('#imgDiv');

                        $('#modal-form-edit-slider').modal('show');
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
    //Funcion para obtener slider de la lista

    //Funcion para obtener modulo de la lista
    $(document).on('click', '#editaModulo', function(e) {
        e.preventDefault();

        var a = $(this).data('item-id');
        var campo = $(this).data('campo');
        console.log(a);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/obtener_item/'+campo+'/'+a,  
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
                        $( "#modId" ).val(data['id']);
                        $( "#editNombreModal" ).val(data['nombre']);
                        tinyMCE.get('editContenidoModal').setContent(data['contenido']);

                        $('#modal-form-edit-modulo').modal('show');
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
    //Funcion para obtener modulo de la lista

    //Funcion para guardar o procesar el slider
    $('#form-edit-slider').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/editar_item',
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
                            $("#sliderlist-"+data+" #titShow").text(formData.get("editTituloModal"));
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

    //Funcion para guardar o procesar el slider
    $('#form-edit-modulo').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '{{ URL::to("/") }}/frontend/carreras/editar_item',
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
                            $("#modulolist-"+data+" #titShow").text(formData.get("editNombreModal"));
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

    

});
</script>
@endsection