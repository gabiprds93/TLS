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
                <strong><a>Nueva Carrera Profesional</a></strong>
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
                <h5>Nueva Carrera Profesional</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nueva_carrera', 'method' => 'POST', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Nombre</label> 
                            {!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Mundo</label> 
                            {!! Form::select('id_mundo', $lista_mundos, null, ['class'=>'form-control','required']) !!}
                        </div>
                        
                    </div>
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Tiempo Total</label> 
                            {!! Form::text('tiempo_total', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Variación de Tiempo</label> 
                            {!! Form::text('variacion_tiempo', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Orden</label> 
                            {!! Form::text('orden', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Video Principal</label> 
                            {!! Form::text('video', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Imagen Referencial</label>
                            {!! Form::file('imagen_referencial', ['required']); !!} 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Imagen Principal</label> 
                            {!! Form::file('img'); !!}
                        </div>
                    </div>
                </div>
                
                <div class="hr-line-dashed"></div>
                <!--
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
                                {!! Form::textarea('descripcion_carrera', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-slider">Agregar Slider</a>

                                <ul class="list-group clear-list m-t" id="listaSliders">
                                </ul>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-contenido">Agregar Contenido </a>

                                <ul class="list-group clear-list m-t" id="listaContenidos">
                                </ul>

                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-modulo">Agregar Módulo</a>
                                <ul class="list-group clear-list m-t" id="listaModulos">
                                </ul>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Imagen Referencial</label>
                                        {!! Form::file('imagen_referencial', ['required']); !!} 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Imagen Principal</label> 
                                        {!! Form::file('img', ['required']); !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Video Principal</label> 
                                        {!! Form::text('video', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-6" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Color de Fondo</label> 
                                        {!! Form::text('color', null, ['class'=>'form-control','required']) !!}
                                    </div>
                                    <div class="form-group"><label>Color de Fondo Móvil</label> 
                                        {!! Form::text('color_mobile', null, ['class'=>'form-control','required']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label>Color de Línea</label> 
                                        {!! Form::text('color', null, ['class'=>'form-control','required']) !!}
                                    </div>
                                    <div class="form-group"><label>Color de Fuente</label> 
                                        {!! Form::text('color_mobile', null, ['class'=>'form-control','required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                -->

                <a href="{{ route('lista_carreras') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Registrar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Formulario de Agregar Sliders-->
<div id="modal-add-slider" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form name="form-add-slider" id="form-add-slider" enctype="multipart/form-data" method="POST">
                        <div class="col-sm-12">
                            <div class="form-group"><label>Agregar Imágen</label> 
                                <input name="img-slider-modal" data-nombre="img-slider-modal" id="img-slider-modal" type="file" />
                            </div>
                            <div class="form-group"><label>Título</label> 
                                <input class="form-control" name="titSliderModal" data-nombre="titSliderModal" id="titSliderModal" type="text" />
                            </div>
                            <div class="form-group"><label>Duración</label> 
                                <input class="form-control" name="durSliderModal" data-nombre="durSliderModal" id="durSliderModal" type="text" />
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="imgSliderDiv">
                                <input type="hidden" id="archivo_imagen_slider">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="agregarSlider">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Sliders-->
<!--Formulario de Agregar Contenido-->
<div id="modal-add-contenido" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#modaltab-1" aria-expanded="true">Certificaciones</a></li>
                                <li class=""><a data-toggle="tab" href="#modaltab-2" aria-expanded="false">
                                ¿Que Ofrecemos?</a></li>
                                <li class=""><a data-toggle="tab" href="#modaltab-3" aria-expanded="false">Talento</a></li>
                                <li class=""><a data-toggle="tab" href="#modaltab-4" aria-expanded="false">Nosotros</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="modaltab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <label>Certificaciones</label>
                                        <textarea class="form-control" id="certModal" name="certModal"></textarea>
                                    </div>
                                </div>
                                <div id="modaltab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <label>¿Que Ofrecemos?</label>
                                        <textarea class="form-control" id="queModal" name="queModal"></textarea>
                                        </ul>
                                    </div>
                                </div>
                                <div id="modaltab-3" class="tab-pane">
                                    <div class="panel-body">
                                        <label>Talento</label>
                                        <textarea class="form-control" id="talModal" name="talModal"></textarea>
                                    </div>
                                </div>
                                <div id="modaltab-4" class="tab-pane">
                                    <div class="panel-body">
                                        <label>Nosotros</label>
                                        <textarea class="form-control" id="nosModal" name="nosModal"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="agregarContenido">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Contenido-->
<!--Formulario de Agregar Módulos-->
<div id="modal-add-modulo" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group"><label>Título de Módulo</label> 
                            <input type="text" class="form-control" id="titModuloModal" name="titModuloModal">
                        </div>
                        <div class="form-group"><label>Contenido</label>
                            <textarea class="form-control" id="contModuloModal" name="contModuloModal"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="agregarModulo">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Módulos-->

<!--Formulario de Editar Slider-->
<div id="modal-edit-slider" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-edit-slider" enctype="multipart/form-data" id="form-edit-slider" method="POST">
                            <input type="hidden" id="numSlider" name="numSlider">
                            <div class="form-group"><label>Editar Imágen</label> 
                                <input name="img-slider-edit-modal" id="img-slider-edit-modal" data-nombre="img-slider-edit-modal" type="file" />
                            </div>
                            <div class="form-group"><label>Título</label> 
                                <input class="form-control" name="titSliderEditModal" data-nombre="titSliderEditModal" id="titSliderEditModal" type="text" />
                            </div>
                            <div class="form-group"><label>Duración</label> 
                                <input class="form-control" name="durSliderEditModal" data-nombre="durSliderEditModal" id="durSliderEditModal" type="text" />
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="imgEditDiv">
                                <input type="hidden" id="archivo_contenidoEditImagen">
                                
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="editarSlider">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Slider-->
<!--Formulario de Editar Contenido-->
<div id="modal-edit-contenido" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" id="numContenido" name="numContenido">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#modal-edit-tab-1" aria-expanded="true">Certificaciones</a></li>
                                <li class=""><a data-toggle="tab" href="#modal-edit-tab-2" aria-expanded="false">
                                ¿Que Ofrecemos?</a></li>
                                <li class=""><a data-toggle="tab" href="#modal-edit-tab-3" aria-expanded="false">Talento</a></li>
                                <li class=""><a data-toggle="tab" href="#modal-edit-tab-4" aria-expanded="false">Nosotros</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="modal-edit-tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <label>Certificaciones</label>
                                        <textarea class="form-control" id="certEditModal" name="certEditModal"></textarea>
                                    </div>
                                </div>
                                <div id="modal-edit-tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <label>¿Que Ofrecemos?</label>
                                        <textarea class="form-control" id="queEditModal" name="queEditModal"></textarea>
                                        </ul>
                                    </div>
                                </div>
                                <div id="modal-edit-tab-3" class="tab-pane">
                                    <div class="panel-body">
                                        <label>Talento</label>
                                        <textarea class="form-control" id="talEditModal" name="talEditModal"></textarea>
                                    </div>
                                </div>
                                <div id="modal-edit-tab-4" class="tab-pane">
                                    <div class="panel-body">
                                        <label>Nosotros</label>
                                        <textarea class="form-control" id="nosEditModal" name="nosEditModal"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="editarContenido">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Contenido-->

<!--Formulario de Editar Link-->
<div id="modal-form-edit-link" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" id="numLink" name="numLink">
                        <div class="form-group"><label>Nombre de Link</label> 
                            <input type="text" class="form-control" id="editNombreLink" name="nombreModalLink">
                        </div>
                        <div class="form-group"><label>Url</label>
                            <input type="text" class="form-control" id="editUrlLink" name="editUrlLink">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="editarLink">Editar Link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Link-->

<!--Formulario de Editar Detalle-->
<div id="modal-form-edit" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="hidden" id="numList" name="numList">
                        <div class="form-group"><label>Título de Detalle</label> 
                            <input type="text" class="form-control" id="editTitDetalleModal" name="titDetalleModal">
                        </div>
                        <div class="form-group"><label>Detalle</label>
                            <textarea class="form-control" id="editDetModal" name="detModal"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="editarDetalle">Editar Detalle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Detalle-->


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

//Funcion para agregar sliders a la lista
$( "#agregarSlider" ).click(function(e) {
    e.preventDefault();
    
    var titSlider = $( "#titSliderModal" ).val();
    var durSlider = $( "#durSliderModal" ).val();
    var imgSlider = $( "#archivo_imagen_slider" ).val();

    if (titSlider && durSlider && imgSlider) {
        var n = $('li[id^="sliderList-"]').length;

        var $item = $( "<li class='list-group-item' id='sliderList-" +n+ "'><input type='hidden' name='titSlider[]' id='titSlider' value='"+ titSlider +"'><input type='hidden' name='durSlider[]' id='durSlider' value='"+ durSlider +"'><input type='hidden' name='imgSlider[]' id='imgSlider' value='"+ imgSlider +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-slider-list='" +n+ "' id='editaSlider'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-slider-list='" +n+ "' id='eliminaLink'></i></button></span><span id='sliderShow'>" + titSlider + "</span></li>" );   
        //Agregar item a la lista
        $("#listaSliders").append($item);
        //Cerrar modal
        $('#modal-add-slider').modal('toggle');
        //Vacia los campmodal-form-link'');
        $( "#titSliderModal" ).val('');
        $( "#img-slider-modal" ).val('');
        $( "#durSliderModal" ).val('');
        $( "#archivo_imagen_slider" ).val('');
        $( "#imgSliderModalShow" ).remove();
        
    }

});
//Funcion para agregar sliders a la lista

//Funcion que muestra la previa de la imagen slider a agregar
$( "#img-slider-modal" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    var formData = new FormData($("#form-add-slider")[0]);

    $.ajax({
        url: 'cargar_imagen/'+campo,  
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(data){
            toastr.clear();
            toastr.warning("Subiendo la imagen, por favor espere...", "TOULOUSE");       
        },
        success: function(data){
            
            switch(data) {
                case '0':
                    toastr.clear();
                    toastr.error("Solo puede subir Imagenes", "TOULOUSE");
                    break;
                default:
                    toastr.clear();
                    $( "#imgSliderModalShow" ).remove();
                    $('#archivo_imagen_slider').val(data.trim());
                    var htmlImg = $('<img id="imgSliderModalShow" src="{{ URL::to('/') }}/'+data.trim()+'" style="width:100%;">');
                    htmlImg.appendTo('#imgSliderDiv');
                    
                    toastr.success("El archivo se ha subido correctamente.", "TOULOUSE");
            }
        },
        //si ha ocurrido un error
        error: function(e){
            toastr.clear();
            toastr.error("Ha ocurrido un error.", "TOULOUSE");
        }
    });
       
});
//Funcion que muestra la previa de la imagen slider a agregar

//Funcion para agregar contenido a la lista
$( "#agregarContenido" ).click(function(e) {
    e.preventDefault();
    var certificaciones = tinyMCE.get('certModal').getContent();
    var ofrecemos = tinyMCE.get('queModal').getContent();
    var talento = tinyMCE.get('talModal').getContent();
    var nosotros = tinyMCE.get('nosModal').getContent();

    if (certificaciones && ofrecemos && talento && nosotros) {
        var n = $('li[id^="contList-"]').length;
        n++;

        var $item = $( "<li class='list-group-item' id='contList-" +n+ "'><input type='hidden' name='certificaciones[]' id='certificaciones' value='"+ certificaciones +"'><input type='hidden' name='ofrecemos[]' id='ofrecemos' value='"+ ofrecemos +"'><input type='hidden' name='talento[]' id='talento' value='"+ talento +"'><input type='hidden' name='nosotros[]' id='nosotros' value='"+ nosotros +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-contenido-list='" +n+ "' id='editaContenido'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-contenido-list='" +n+ "' id='eliminaContenido'></i></button></span><span id='contenidoShow'>" + n + "</span></li>" );   
        //Agregar item a la lista
        $("#listaContenidos").append($item);
        //Cerrar modal
        $('#modal-add-contenido').modal('toggle');
        //Vacia los campmodal-form-link'');
        tinyMCE.get('certModal').setContent('');
        tinyMCE.get('queModal').setContent('');
        tinyMCE.get('talModal').setContent('');
        tinyMCE.get('nosModal').setContent('');
    }

});
//Funcion para agregar contenido a la lista

//Funcion para agregar modulos a la lista
$( "#agregarModulo" ).click(function(e) {
    preventDefault();
    var titulo = $( "#titModuloModal" ).val();
    var contenido = tinyMCE.get('contModuloModal').getContent();

    if (titulo && contenido) {
        var n = $('li[id^="modList-"]').length;

        var $item = $( "<li class='list-group-item' id='modList-" +n+ "'><input type='hidden' name='tituloModulo[]' id='tituloModulo' value='"+ titulo +"'><input type='hidden' name='contenidoModulo[]' id='contenidoModulo' value='"+ contenido +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-list='" +n+ "' id='editaDetalle'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-list='" +n+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + titulo + "</span></li>" );   
        //Agregar item a la lista
        $("#listaModulos").append($item);
        //Cerrar modal
        $('#modal-add-modulo').modal('toggle');
        //Vacia los campos del formulario del modal
        $( "#titModuloModal" ).val('');
        tinyMCE.get('contModuloModal').setContent('');
    }

});
//Funcion para agregar modulos a la lista

//ACCIONES DE EDITAR EN MODAL

//Función para obtener Slider de la lista
$(document).on('click', '#editaSlider', function(e) {
    e.preventDefault();
    var a = $(this).data('slider-list');    
    var values = $('#sliderList-'+ a +' > input');
    
    var titulo = values[0]['value'];
    var duracion = values[1]['value'];
    var imagen = values[2]['value'];
 
    var htmlImg = $('<img id="sliderModalEditShow" src="{{ URL::to('/') }}/'+imagen+'" style="width:100%;">');
    htmlImg.appendTo('#imgEditDiv');
    //$( "#numLink" ).val(a);
    //$( "#imgSliderEditModal" ).val(imagen);
    $( "#titSliderEditModal" ).val(titulo);
    $( "#durSliderEditModal" ).val(duracion);
    
    $( "#numSlider" ).val(a);
    $('#modal-edit-slider').modal('show');
});
//Función para obtener Slider de la lista

//Funcion del boton de editar slider
$( "#editarSlider" ).click(function(e) {
    e.preventDefault();
    //Obtengo datos de edicion
    var id = $( "#numSlider" ).val();
    var nueTit = $( "#titSliderEditModal" ).val();
    var nueDur = $( "#durSliderEditModal" ).val();
    var nueImg = $( "#archivo_contenidoEditImagen" ).val();

    if (nueTit && nueDur && nueImg) {
        //Encuentro el elemento a editar
        var dom = document.getElementById("sliderList-"+id);
        //Obtengo los campos a editar
        var titulo = $(dom).find("#titSlider"); 
        var duracion = $(dom).find("#durSlider"); 
        var imagen = $(dom).find("#imgSlider"); 
        //Asigno los nuevos valores
        titulo.val(nueTit);
        duracion.val(nueDur);
        imagen.val(nueImg);
        //Cambio el texto dentro del span de la lista
        $(dom).find('#sliderShow').text(nueTit);   
        //Cierro el modal
        $('#modal-edit-slider').modal('toggle');
        //Vacio los campos nuevamente
        $( "#titSliderEditModal" ).val('');
        $( "#durSliderEditModal" ).val('');
        $( "#archivo_contenidoEditImagen" ).val('');
        $( "#sliderModalEditShow" ).remove();
        
    }
});
//Funcion del boton de editar slider

//Funcion que sube la imagen a editar
$( "#img-slider-edit-modal" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    var formData = new FormData($("#form-edit-slider")[0]);

    $.ajax({
        url: 'cargar_imagen/'+campo,  
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(){
            toastr.clear();
            toastr.warning("Subiendo el archivo, por favor espere...", "TOULOUSE");       
        },
        success: function(data){

            switch(data) {
                case '0':
                    toastr.clear();
                    toastr.error("Solo puede subir Imagenes", "TOULOUSE");
                    break;
                default:
                    toastr.clear();
                    $( "#sliderModalEditShow" ).remove();
                    $('#archivo_contenidoEditImagen').val(data.trim());
                    var htmlImg = $('<img id="sliderModalEditShow" src="{{ URL::to('/') }}/'+data.trim()+'" style="width:100%;">');
                    htmlImg.appendTo('#imgEditDiv');
                    
                    toastr.success("El archivo se ha subido correctamente.", "TOULOUSE");
            }
        },
        //si ha ocurrido un error
        error: function(e){
            toastr.clear();
            toastr.error("Ha ocurrido un error.", "TOULOUSE");
        }
    });
    
    
});
//Funcion que sube la imagen a editar

//Funcion para editar detalles de la lista
$(document).on('click', '#editaContenido', function(e) {
    e.preventDefault();

    var a = $(this).data('contenido-list');
    console.log(a);
    //$('#list-'+a).remove();
    var values = $('#contList-'+ a +' > input');
    console.log(values);
    
    var cert = values[0]['value'];
    var que = values[1]['value'];
    var tal = values[2]['value'];
    var nos = values[3]['value'];

    $( "#numContenido" ).val(a);

    tinyMCE.get('certEditModal').setContent(cert);
    tinyMCE.get('queEditModal').setContent(que);
    tinyMCE.get('talEditModal').setContent(tal);
    tinyMCE.get('nosEditModal').setContent(nos);

    $('#modal-edit-contenido').modal('show');
    
});
//Funcion para editar detalles de la lista

//Funcion del boton de editar contenido
$( "#editarContenido" ).click(function() {
    //Obtengo datos de edicion
    var id = $( "#numContenido" ).val();
    var nueCert = tinyMCE.get('certEditModal').getContent();
    var nueQue = tinyMCE.get('queEditModal').getContent();
    var nueTal = tinyMCE.get('talEditModal').getContent();
    var nueNos = tinyMCE.get('nosEditModal').getContent();

    if (nueCert && nueQue && nueTal && nueNos) {
        //Encuentro el elemento a editar
        var dom = document.getElementById("contList-"+id);
        //Obtengo los campos a editar
        var certificados = $(dom).find("#certificados"); 
        var ofrecemos = $(dom).find("#ofrecemos"); 
        var talentos = $(dom).find("#talento"); 
        var nosotros = $(dom).find("#nosotros"); 
        //Asigno los nuevos valores
        certificados.val(nueCert);
        ofrecemos.val(nueQue);
        talentos.val(nueTal);
        nosotros.val(nueNos);

        //Cierro el modal
        $('#modal-form-edit').modal('toggle');
        //Vacio los campos nuevamente
        tinyMCE.get('certEditModal').setContent('');
        tinyMCE.get('queEditModal').setContent('');
        tinyMCE.get('talEditModal').setContent('');
        tinyMCE.get('nosEditModal').setContent('');
    }
});
//Funcion del boton de editar contenido







//Funcion para quitar detalles de la lista
$(document).on('click', '#eliminaLink', function(e) {
    var a = $(this).data('link-list');
    $('#linkList-'+a).remove();
});
//Funcion para quitar detalles de la lista

//Funcion para quitar detalles de la lista
$(document).on('click', '#eliminaDetalle', function() {
    var a = $(this).data('list');
    $('#list-'+a).remove();
});
//Funcion para quitar detalles de la lista

//Funcion para editar link de la lista
$(document).on('click', '#editaLink', function(e) {
    e.preventDefault();
    var a = $(this).data('link-list');
    //$('#list-'+a).remove();
    var values = $('#linkList-'+ a +' > input');
    
    var nombre = values[0]['value'];
    var link = values[1]['value'];

    $( "#numLink" ).val(a);
    $( "#editNombreLink" ).val(nombre);
    $( "#editUrlLink" ).val(link);

    $('#modal-form-edit-link').modal('show');
    
});
//Funcion para editar link de la lista

//Funcion del boton de editar link
$( "#editarLink" ).click(function() {
    //Obtengo datos de edicion
    var id = $( "#numLink" ).val();
    var nueNomb = $( "#editNombreLink" ).val();
    var nueLink = $( "#editUrlLink" ).val();

    if (nueNomb && nueLink) {
        //Encuentro el elemento a editar
        var dom = document.getElementById("linkList-"+id);
        //Obtengo los campos a editar
        var nombre = $(dom).find("#nomLink"); 
        var link = $(dom).find("#rutaLink"); 
        //Asigno los nuevos valores
        nombre.val(nueNomb);
        link.val(nueLink);
        //Cambio el texto dentro del span de la lista
        $(dom).find('#linkShow').text(nueNomb);   
        //Cierro el modal
        $('#modal-form-edit-link').modal('toggle');
        //Vacio los campos nuevamente
        $( "#editNombreLink" ).val('');
        $( "#editUrlLink" ).val('');
        
    }
});
//Funcion del boton de editar link

//Funcion para editar detalles de la lista
$(document).on('click', '#editaDetalle', function() {
    var a = $(this).data('list');
    //$('#list-'+a).remove();
    var values = $('#list-'+ a +' > input');
    
    var tit = values[0]['value'];
    var det = values[1]['value'];

    $( "#numList" ).val(a);
    $( "#editTitDetalleModal" ).val(tit);
    //tinyMCE.activeEditor.setContent(det);
    tinyMCE.get('editDetModal').setContent(det);

    $('#modal-form-edit').modal('show');
    
});
//Funcion para editar detalles de la lista

//Funcion del boton de editar detalle
$( "#editarDetalle" ).click(function() {
    //Obtengo datos de edicion
    var id = $( "#numList" ).val();
    var nueTit = $( "#editTitDetalleModal" ).val();
    var nueDet = tinyMCE.get('editDetModal').getContent();

    if (nueTit && nueDet) {
        //Encuentro el elemento a editar
        var dom = document.getElementById("list-"+id);
        //Obtengo los campos a editar
        var titulo = $(dom).find("#titDetalle"); 
        var detalle = $(dom).find("#detalle"); 
        //Asigno los nuevos valores
        titulo.val(nueTit);
        detalle.val(nueDet);
        //Cambio el texto dentro del span de la lista
        $(dom).find('#titShow').text(nueTit);   
        //Cierro el modal
        $('#modal-form-edit').modal('toggle');
        //Vacio los campos nuevamente
        $( "#editTitDetalleModal" ).val('');
        tinyMCE.get('editDetModal').setContent('');
    }
});
//Funcion del boton de editar detalle

//Funcion que muestra la previa de la imagen a agregar
$( "#contenidoImagen" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    //var pregunta = elem.data('pregunta');
    var formData = new FormData($("#form-upload-image")[0]);
    $.ajax({
        url: 'cargar_documento/'+campo,  
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(){
            toastr.clear();
            toastr.warning("Subiendo el archivo, por favor espere...", "TOULOUSE");       
        },
        success: function(data){
            switch(data) {
                case '0':
                    toastr.clear();
                    toastr.error("Solo puede subir Imagenes", "TOULOUSE");
                    break;
                default:
                    toastr.clear();
                    $('#archivo_'+campo).val(data.trim());
                    var htmlImg = $('<img id="imgModalShow" src="{{ URL::to('/') }}/'+data.trim()+'" style="width:100%;">');
                    htmlImg.appendTo('#imgDiv');
                    
                    toastr.success("El archivo se ha subido correctamente.", "TOULOUSE");
            }
        },
        //si ha ocurrido un error
        error: function(e){
            toastr.clear();
            toastr.error("Ha ocurrido un error.", "TOULOUSE");
        }
    });
       
});
//Funcion que muestra la previa de la imagen a agregar

//Funcion para agregar detalles a la lista de imagenes
$( "#agregarImagen" ).click(function(e) {
    e.preventDefault();
    
    var imgModal = $( "#archivo_contenidoImagen" ).val();

    if (imgModal) {
        var n = $('li[id^="imglist-"]').length;

        var $item = $( "<li class='list-group-item' id='imglist-" +n+ "'><input type='hidden' name='imagenUrl[]' id='imagenItem-" +n+ "' value='"+ imgModal +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-img='" +n+ "' id='editaImagen'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-img='" +n+ "' id='eliminaImagen'></i></button></span><span id='imgShow'><img id='imgTest-"+n+"' src='{{ URL::to("/") }}/"+imgModal+"'  style='width:200px;'></span></li>" ); 

        //Agregar item a la lista
        $("#listaImagenes").append($item);
        //Cerrar modal
        $('#modal-form-add-image').modal('toggle');

        //Vaciar los campos
        $( "#archivo_contenidoImagen" ).val('');
        $( "#contenidoImagen" ).val('');
        $( "#imgModalShow" ).remove();
    }

});
//Funcion para agregar detalles a la lista de imagenes

//Funcion para quitar la imagen
$(document).on('click', '#eliminaImagen', function(e) {
    e.preventDefault();
    var a = $(this).data('img');
    $('#imglist-'+a).remove();
});
//Funcion para quitar la imagen

//Funcion para mostrar imagen en modal para editar
$(document).on('click', '#editaImagen', function(e) {
    e.preventDefault();
    var a = $(this).data('img');    
    var imgObj = $('#imagenItem-'+a).val();
 
    var htmlImg = $('<img id="imgModalEditShow" src="{{ URL::to('/') }}/'+imgObj+'" style="width:100%;">');
    htmlImg.appendTo('#imgEditDiv');
    
    $( "#numImg" ).val(a);
    $('#modal-form-edit-image').modal('show');
});
//Funcion para mostrar imagen en modal para editar

//Funcion que muestra la previa de la imagen a agregar
$( "#imagenEditModal" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    var formData = new FormData($("#upload_form_edit")[0]);

    $.ajax({
        url: 'cargar_documento/'+campo,  
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(){
            toastr.clear();
            toastr.warning("Subiendo el archivo, por favor espere...", "TOULOUSE");       
        },
        success: function(data){

            switch(data) {
                case '0':
                    toastr.clear();
                    toastr.error("Solo puede subir Imagenes", "TOULOUSE");
                    break;
                default:
                    toastr.clear();
                    $( "#imgModalEditShow" ).remove();
                    $('#archivo_contenidoEditImagen').val(data.trim());
                    var htmlImg = $('<img id="imgModalEditShow" src="{{ URL::to('/') }}/'+data.trim()+'" style="width:100%;">');
                    htmlImg.appendTo('#imgEditDiv');
                    
                    toastr.success("El archivo se ha subido correctamente.", "TOULOUSE");
            }
        },
        //si ha ocurrido un error
        error: function(e){
            toastr.clear();
            toastr.error("Ha ocurrido un error.", "TOULOUSE");
        }
    });
    
    
});
//Funcion que muestra la previa de la imagen a agregar

//Funcion del boton de editar imagen
$( "#editarImagen" ).click(function(e) {
    e.preventDefault();
    $( "#imgModalEditShow" ).remove();
    //Obtengo datos de edicion
    var id = $( "#numImg" ).val();

    var nueImgModal = $( "#archivo_contenidoEditImagen" ).val();

    if (nueImgModal) {
        //Encuentro el elemento a editar
        //var dom = document.getElementById("imglist-"+id);
        //Obtengo los campos a editar
        var imgHidden = $("#imagenItem-"+id);
        var imgObj = $("#imgTest-"+id); 
        //Asigno los nuevos valores
        imgHidden.val(nueImgModal);
        //Cambio el texto dentro del span de la lista
        imgObj.attr('src','{{ URL::to('/') }}/'+nueImgModal+'');
        //Cierro el modal
        $('#modal-form-edit-image').modal('toggle');
        //Vacio los campos nuevamente
        $( "#archivo_contenidoEditImagen" ).val('');
        $( "#imagenEditModal" ).val('');
        
    }
});
//Funcion del boton de editar imagen

</script>
@endsection