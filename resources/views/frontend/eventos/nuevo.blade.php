@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Evento</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_eventos') }}">Lista de Eventos</a>
            </li>
            <li class="active">
                <strong><a>Nuevo Evento</a></strong>
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
                <h5>Nuevo Evento</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nuevo_evento', 'method' => 'POST', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Nombre</label> 
                            {!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Sede</label> 
                            {!! Form::select('id_sede', $lista_sedes, null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Fecha</label> 
                            {!! Form::date('fecha', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Hora</label> 
                            {!! Form::time('hora', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Descripción</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Contenido</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Imagenes</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                               <div class="form-group"><label>Descripción</label> 
                                    {!! Form::textarea('desc_home', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="tabs-container">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#det-1" aria-expanded="true">De qué trata el taller</a></li>
                                        <li class=""><a data-toggle="tab" href="#det-2" aria-expanded="false">Contenido</a></li>
                                        <li class=""><a data-toggle="tab" href="#det-3" aria-expanded="false">Expositores</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="det-1" class="tab-pane active">
                                            <div class="panel-body">
                                               <div class="form-group"> 
                                                    {!! Form::textarea('que_trata_taller', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="det-2" class="tab-pane">
                                            <div class="panel-body">
                                               <div class="form-group">
                                                    {!! Form::textarea('contenido', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="det-3" class="tab-pane">
                                            <div class="panel-body">
                                               <div class="form-group"> 
                                                    {!! Form::textarea('expositores', null, ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-form-add-image">Agregar Imágen</a>
                                <ul class="list-group clear-list m-t" id="listaImagenes">
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <a href="{{ route('lista_eventos') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit" id="registrar">Registrar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

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

//Funcion que muestra la previa de la imagen a agregar
$( "#contenidoImagen" ).change(function() {

    var elem = $(this);
    var campo = elem.data('nombre');
    //var pregunta = elem.data('pregunta');
    var formData = new FormData($("#form-upload-image")[0]);
    $.ajax({
        url: '{{ URL::to("/") }}/frontend/eventos/subir_imagen/'+campo,  
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
        url: '{{ URL::to("/") }}/frontend/eventos/subir_imagen/'+campo,  
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

</script>
@endsection