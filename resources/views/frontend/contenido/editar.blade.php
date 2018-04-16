@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Contenido</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_contenido') }}">Lista de Contenidos</a>
            </li>
            <li class="active">
                <strong><a>Editar Contenido</a></strong>
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
                <h5>Editar Contenido</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_contenido', $contenido], 'method' => 'PUT', 'files' => true]) !!}

                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Migaja de Pan (Breadcrumb)</label> 
                            {!! Form::text('titulo', $contenido->titulo, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Título de Contenido</label> 
                            {!! Form::text('subtitulo', $contenido->subtitulo, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Orden</label> 
                            {!! Form::number('orden', $contenido->orden, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Sección</label> 
                            {!! Form::select('id_seccion', $lista_secciones, $contenido->id_seccion, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Link de Video (Youtube)</label> 
                            {!! Form::text('video', $contenido->video, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group"><label>Posición de Links</label> 
                            {!! Form::select('posicion_links', ['A' => 'Superior', 'D' => 'Inferior'] ,$contenido->posicion_links, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Links</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Pestañas</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Multimedia</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Contenidos</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-5" aria-expanded="false">Estilos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                               <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-form-link">Agregar Link</a>



                                <ul class="list-group clear-list m-t" id="listaLinks">
                                    @foreach($contenido->links as $link)
                                    <li class='list-group-item' id='linklist-{{$loop->iteration}}'>
                                        <input type='hidden' name='links[{{$loop->iteration}}][nomLink]' id='nomLink' value='{{$link->nombre}}'>
                                        <input type='hidden' name='links[{{$loop->iteration}}][rutaLink]' id='rutaLink' value='{{$link->url}}'>
                                        <input type='hidden' name='links[{{$loop->iteration}}][idLink]' id='idLink' value='{{$link->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-link-list='{{$loop->iteration}}' id='editaLink'></i>
                                            </button> 
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$link->id}}' data-campo='link' data-num='{{$link->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='linkShow'>{{$link->nombre}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-form">Agregar Pestaña</a>

                                <ul class="list-group clear-list m-t" id="listaDetalles">
                                    @foreach($contenido->detalles as $det)
                                    <li class='list-group-item' id='detallelist-{{$det->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-campo="detalle" data-item-id='{{$det->id}}' id='editaDetalle'></i>
                                            </button> 
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$det->id}}' data-campo='detalle' data-num='{{$det->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='titShow'>{{$det->titulo}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-form-add-image">Agregar Imágen</a>
                                <ul class="list-group clear-list m-t" id="listaImagenes">
                                    @foreach($contenido->imagenes as $ima)
                                    <li class='list-group-item' id='imglist-{{$loop->iteration}}'>
                                        <input type='hidden' name='imagenes[{{$loop->iteration}}][imagenUrl]' id='imagenItem-{{$loop->iteration}}' value='{{$ima->imagen}}'>
                                        <input type='hidden' name='imagenes[{{$loop->iteration}}][idImagen]' value='{{$ima->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-img='{{$loop->iteration}}' id='editaImagen'></i>
                                            </button>
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$ima->id}}' data-campo='img' data-num='{{$ima->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='imgShow'>
                                            <img id='imgTest-{{$loop->iteration}}' src='{{ URL::to("/") }}/{{$ima->imagen}}'  style='width:200px;'>
                                        </span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <div class="form-group"><label>Texto de Contenido</label> 
                                        {!! Form::textarea('texto_contenido', $contenido->texto_contenido, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label>Pie de Contenido</label> 
                                        {!! Form::textarea('pie_contenido', $contenido->pie_contenido, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <div class="form-group"><label>Link de Android (Opcional)</label>
                                        {!! Form::text('link_android', $contenido->link_android, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label>Link de IOS (Opcional)</label>
                                        {!! Form::text('link_ios', $contenido->link_ios, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-3 b-r">
                                        <div class="form-group"><label>Color de Fondo</label> 
                                            {!! Form::text('color_contenido', $contenido->color_contenido, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                        <div class="form-group"><label>Color Título</label> 
                                            {!! Form::text('color_titulo', $contenido->color_titulo, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-3 b-r">
                                        <div class="form-group"><label>Color Detalle</label> 
                                            {!! Form::text('color_detalle', $contenido->color_detalle, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                        <div class="form-group"><label>Color de Links</label> 
                                            {!! Form::text('color_link', $contenido->color_link, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3 b-r">
                                        <div class="form-group"><label>Color Subrayado del Link</label> 
                                            {!! Form::text('color_sub_link', $contenido->color_sub_link, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                        <div class="form-group"><label>Color Subrayado del Detalle</label> 
                                            {!! Form::text('color_sub_tab', $contenido->color_sub_tab, ['class'=>'form-control', 'maxlength' => 6]) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group"><label>¿Slide Lab?</label> 
                                            {!! Form::select('slide_lab', ['N' => 'No', 'S' => 'Si'] ,$contenido->slide_lab, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"><label>Imagen de Fondo</label> 
                                            <input type="file" name="imagen_fondo">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($contenido->imagen_fondo)
                                        <label>Imagen de Fondo Actual</label>         
                                        <img style="width: 100%" src="{{ URL::to('/') }}/img/contenidos/{{$contenido->imagen_fondo}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"><label>Imagen de App</label> 
                                            <input type="file" name="imagen_app">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($contenido->imagen_app)
                                        <label>Imagen de App Actual</label>         
                                        <img style="width: 100%" src="{{ URL::to('/') }}/img/contenidos/{{$contenido->imagen_app}}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_contenido') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Formulario de Agregar Link-->
<div id="modal-form-link" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group"><label>Nombre de Link</label> 
                            <input type="text" class="form-control" id="nombreLink" name="nombreLink">
                        </div>
                        <div class="form-group"><label>Url</label>
                            <input type="text" class="form-control" id="urlLink" name="urlLink">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="agregarLink">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Link-->
<!--Formulario de Agregar Detalle-->
<div id="modal-form" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-add-detalle" id="form-add-detalle" method="POST">
                            <input type="hidden" name="id_contenido" id="id_contenido" value="{{ $contenido->id}}">
                            <input type="hidden" name="campo" id="campo" value="detalle">
                            <div class="form-group"><label>Título de Pestaña</label> 
                                <input type="text" class="form-control" id="titDetalleModal" name="titDetalleModal" maxlength="50">
                            </div>
                            <div class="form-group"><label>Contenido de Pestaña</label>
                                <textarea class="form-control" id="detModal" name="detModal"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="agregarDetalle">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Detalle-->
<!--Formulario de Agregar Imagen-->
<div id="modal-form-add-image" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <form name="form-upload-image" id="form-upload-image" enctype="multipart/form-data" id="upload_form" method="POST">
                        <div class="col-sm-12">
                            <div class="form-group"><label>Agregar Imágen</label> 
                                <input name="contenidoImagen" data-nombre="contenidoImagen" id="contenidoImagen" type="file" />
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="imgDiv">
                                <input type="hidden" id="archivo_contenidoImagen">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="agregarImagen">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Imagen-->

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
                        <input type="hidden" id="itemId" name="itemId">
                        <div class="form-group"><label>Título de Pestaña</label> 
                            <input type="text" class="form-control" id="editTitDetalleModal" name="titDetalleModal">
                        </div>
                        <div class="form-group"><label>Contenido de Pestaña</label>
                            <textarea class="form-control" id="editDetModal" name="detModal"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" data-campo="detalle" id="editarDetalle">Editar Detalle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Detalle-->
<!--Formulario de Editar Imagen-->
<div id="modal-form-edit-image" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-upload-edit-image" enctype="multipart/form-data" id="upload_form_edit" method="POST">
                            <input type="hidden" id="numImg" name="numImg">
                            <div class="form-group"><label>Editar Imágen</label> 
                                <input name="contenidoImagen" id="imagenEditModal" data-nombre="contenidoImagen" type="file" />
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="imgEditDiv">
                                <input type="hidden" id="archivo_contenidoEditImagen">
                                
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id="editarImagen">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Imagen-->

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

//Funcion para agregar imagenes a la lista
$( "#agregarLink" ).click(function(e) {
    e.preventDefault();
    //console.log('Hola');
    var nombreLinkModal = $( "#nombreLink" ).val();
    var urlLinkModal = $( "#urlLink" ).val();

    if (nombreLinkModal && urlLinkModal) {
        var n = $('li[id^="linklist-"]').length;
        n++;

        var $item = $( "<li class='list-group-item' id='linklist-" +n+ "'><input type='hidden' name='links[" +n+ "][nomLink]' id='nomLink' value='"+ nombreLinkModal +"'><input type='hidden' name='links[" +n+ "][rutaLink]' id='rutaLink' value='"+ urlLinkModal +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-link-list='" +n+ "' id='editaLink'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-link-list='" +n+ "' id='eliminaLink'></i></button></span><span id='linkShow'>" + nombreLinkModal + "</span></li>" );   
        //Agregar item a la lista
        $("#listaLinks").append($item);
        //Cerrar modal
        $('#modal-form-link').modal('toggle');
        //Vacia los campmodal-form-link'');
        $( "#nombreLink" ).val('');
        $( "#urlLink" ).val('');
    }

});
//Funcion para agregar imagenes a la lista

//Funcion para quitar detalles de la lista
$(document).on('click', '#eliminaLink', function(e) {
    e.preventDefault();
    var a = $(this).data('link-list');
    $('#linklist-'+a).remove();
});
//Funcion para quitar detalles de la lista

//Funcion para agregar detalles a la lista
$( "#agregarDetalle" ).click(function(e) {
    e.preventDefault();
    
    var campo = $('#form-add-detalle').find('input[name="campo"]').val();
    var id_contenido = $('#form-add-detalle').find('input[name="id_contenido"]').val();
    var titDetModal = $( "#titDetalleModal" ).val();
    var detModal = tinyMCE.get('detModal').getContent();
    if (titDetalleModal && detModal) {

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/contenido/guardar_item',  
            type: 'POST',
            data: { 
                'id': id_contenido, 
                'campo': campo,
                'valor': {
                    'titulo': titDetModal,
                    'detalle': detModal
                } 
            },
            cache: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function(url){
                toastr.clear();
                toastr.warning("Guardando ítem", "TOULOUSE");       
            },
            success: function(data){
                switch(data) {
                    case '0':
                        toastr.clear();
                        toastr.error("No se ha podido guardar el ítem", "TOULOUSE");
                        break;
                    default:
                        toastr.clear();
                        //Vacia los campos
                        $('#form-add-detalle')[0].reset();
                        //Agregar item
                        var $item = $( "<li class='list-group-item' id='detallelist-" +data.trim()+ "'><input type='hidden' name='idDetalle' id='idDetalle' value='"+ data.trim() +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-campo='detalle' data-list='" +data.trim()+ "' id='editaDetalle'></i></button> <button class='btn btn-xs btn-danger'><i class='fa fa-trash' data-list='" +data.trim()+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + titDetModal + "</span></li>" );
                        //Agregar item a la lista
                        $("#listaDetalles").append($item);
                        //Cerrar modal
                        $('#modal-form').modal('toggle');  
                        toastr.success("El ítem se ha registrado correctamente.", "TOULOUSE");        
                }
            },
            //si ha ocurrido un error
            error: function(e){
                toastr.clear();
                toastr.error("Ha ocurrido un error al intentar guardar el ítem.", "TOULOUSE");
            }
        });

    }

});
//Funcion para agregar detalles a la lista

//Funcion para quitar detalles de la lista
$(document).on('click', '#eliminaDetalle', function(e) {
    e.preventDefault();
    var a = $(this).data('list');
    $('#detallelist-'+a).remove();
});
//Funcion para quitar detalles de la lista

//Funcion para editar link de la lista
$(document).on('click', '#editaLink', function(e) {
    e.preventDefault();
    var a = $(this).data('link-list');
    var values = $('#linklist-'+ a +' > input');
    
    var nombre = values[0]['value'];
    var link = values[1]['value'];

    $( "#numLink" ).val(a);
    $( "#editNombreLink" ).val(nombre);
    $( "#editUrlLink" ).val(link);

    $('#modal-form-edit-link').modal('show');
    
});
//Funcion para editar link de la lista

//Funcion del boton de editar link
$( "#editarLink" ).click(function(e) {
    e.preventDefault();
    //Obtengo datos de edicion
    var id = $( "#numLink" ).val();
    var nueNomb = $( "#editNombreLink" ).val();
    var nueLink = $( "#editUrlLink" ).val();

    if (nueNomb && nueLink) {
        //Encuentro el elemento a editar
        var dom = document.getElementById("linklist-"+id);
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
$(document).on('click', '#editaDetalle', function(e) {
    e.preventDefault();
    var a = $(this).data('item-id');
    var campo = $(this).data('campo');

    $.ajax({
        url: '{{ URL::to("/") }}/frontend/contenido/obtener_item/'+campo+'/'+a,  
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
                    $( "#editTitDetalleModal" ).val(data['titulo']);
                    tinyMCE.get('editDetModal').setContent(data['detalle']);

                    $('#modal-form-edit').modal('show');
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
//Funcion para editar detalles de la lista

//Funcion del boton de editar detalle
$( "#editarDetalle" ).click(function(e) {
    e.preventDefault();
    //Obtengo datos de edicion
    var id = $( "#itemId" ).val();
    var campo = $(this).data('campo');

    var nueTit = $( "#editTitDetalleModal" ).val();
    var nueDet = tinyMCE.get('editDetModal').getContent();

    if (id && nueTit && nueDet) {

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/contenido/editar_item',  
            type: 'POST',
            data: { 
                'id': id, 
                'campo': campo,
                'valor': {
                    'titulo': nueTit,
                    'detalle': nueDet
                } 
            },
            cache: false,
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
                        var dom = document.getElementById("detallelist-"+id);
                        $(dom).find('#titShow').text(data.trim()); 
                        $('#modal-form-edit').modal('toggle');
                        break;
                }
            },
            //si ha ocurrido un error
            error: function(e){
                toastr.clear();
                toastr.error("Ha ocurrido un error al intentar editar el ítem.", "TOULOUSE");
            }
        });

    }else{
        toastr.clear();
        toastr.error("No pueden haber campos vacios en esta edición", "TOULOUSE");
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
        url: '{{ URL::to("/") }}/frontend/contenido/cargar_documento/'+campo,  
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(url){
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
        n++;

        var $item = $( "<li class='list-group-item' id='imglist-" +n+ "'><input type='hidden' name='imagenes[" +n+ "][imagenUrl]' id='imagenItem-" +n+ "' value='"+ imgModal +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-img='" +n+ "' id='editaImagen'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-img='" +n+ "' id='eliminaImagen'></i></button></span><span id='imgShow'><img id='imgTest-"+n+"' src='{{ URL::to("/") }}/"+imgModal+"'  style='width:200px;'></span></li>" ); 

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

$('#modal-form-edit-image').on('hidden.bs.modal', function () {
  
})
//Funcion para mostrar imagen en modal para editar

//Funcion que muestra la previa de la imagen a agregar
$( "#imagenEditModal" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    var formData = new FormData($("#upload_form_edit")[0]);

    $.ajax({
        url: '{{ URL::to("/") }}/frontend/contenido/cargar_documento/'+campo,  
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
        $( "#imgModalEditShow" ).remove();
        
    }
});
//Funcion del boton de editar imagen

//Funcion para eliminar la imagen
$(document).on('click', '#eliminaItem', function(e) {
    e.preventDefault();
    var campo = $(this).data('campo');
    var id = $(this).data('item-id');
    var num = $(this).data('num');

    $('#idDel').val(id);
    $('#campoDel').val(campo);
    $('#listNum').val(num);

    $('#modal-eliminar-item').modal('show');    
});
//Funcion para eliminar la imagen

//Funcion para eliminar la imagen
$(document).on('click', '#deleteItem', function(e) {
    e.preventDefault();
    var campo = $('#campoDel').val();
    var id = $('#idDel').val();
    var num = $('#listNum').val();

    $.ajax({
        url: '{{ URL::to("/") }}/frontend/contenido/eliminar_detalle/'+campo+'/'+id,  
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function(){
            toastr.clear();
            toastr.warning("Espere un momento mientras se elimina el ítem", "TOULOUSE");       
        },
        success: function(data){
            switch(data) {
                case '0':
                    toastr.clear();
                    toastr.error("ERROR! No se pudo eliminar el ítem", "TOULOUSE");
                    break;
                default:
                    $('#modal-eliminar-item').modal('toggle');
                    $('#idDel').val('');
                    $('#campoDel').val('');
                    $('#listNum').val('');
                    $('#'+campo+'list-'+num).remove();

                    toastr.clear();                    
                    toastr.success("El ítem se ha eliminado correctamente.", "TOULOUSE");
            }
        },
        //si ha ocurrido un error
        error: function(e){
            toastr.clear();
            toastr.error("Ha ocurrido un error al intentar eliminar el ítem.", "TOULOUSE");
        }
    });
});
//Funcion para eliminar la imagen

</script>
@endsection