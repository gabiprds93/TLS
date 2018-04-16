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
                <strong><a>Nuevo Contenido</a></strong>
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
                <h5>Nuevo Contenido</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nuevo_contenido', 'method' => 'POST', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Migaja de Pan (Breadcrumb)</label> 
                            {!! Form::text('titulo', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Título de Contenido</label> 
                            {!! Form::text('subtitulo', null, ['class'=>'form-control','required']) !!}
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Orden</label> 
                            {!! Form::number('orden', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Sección</label> 
                            {!! Form::select('id_seccion', $lista_secciones, null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Video</label> 
                            {!! Form::text('video', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group"><label>Posición de Links</label> 
                            {!! Form::select('posicion_links', ['A' => 'Superior', 'D' => 'Inferior'] , null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <a href="{{ route('lista_contenido') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Registrar</button>
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
                        <div class="form-group"><label>Título de Detalle</label> 
                            <input type="text" class="form-control" id="titDetalleModal" name="titDetalleModal">
                        </div>
                        <div class="form-group"><label>Detalle</label>
                            <textarea class="form-control" id="detModal" name="detModal"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="agregarDetalle">Agregar</button>
                        </div>
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

//Funcion para agregar imagenes a la lista
$( "#agregarLink" ).click(function() {
    //console.log('Hola');
    var nombreLinkModal = $( "#nombreLink" ).val();
    var urlLinkModal = $( "#urlLink" ).val();

    if (nombreLinkModal && urlLinkModal) {
        var n = $('li[id^="linkList-"]').length;

        var $item = $( "<li class='list-group-item' id='linkList-" +n+ "'><input type='hidden' name='nomLink[]' id='nomLink' value='"+ nombreLinkModal +"'><input type='hidden' name='rutaLink[]' id='rutaLink' value='"+ urlLinkModal +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-link-list='" +n+ "' id='editaLink'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-link-list='" +n+ "' id='eliminaLink'></i></button></span><span id='linkShow'>" + nombreLinkModal + "</span></li>" );   
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
    var a = $(this).data('link-list');
    $('#linkList-'+a).remove();
});
//Funcion para quitar detalles de la lista

//Funcion para agregar detalles a la lista
$( "#agregarDetalle" ).click(function() {
    //console.log('Hola');
    var titDetModal = $( "#titDetalleModal" ).val();
    var detModal = tinyMCE.activeEditor.getContent();

    if (titDetalleModal && detModal) {
        var n = $('li[id^="list-"]').length;

        var $item = $( "<li class='list-group-item' id='list-" +n+ "'><input type='hidden' name='titDetalle[]' id='titDetalle' value='"+ titDetModal +"'><input type='hidden' name='detalle[]' id='detalle' value='"+ detModal +"'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-list='" +n+ "' id='editaDetalle'></i></button> <button class='btn btn-xs btn-warning'><i class='fa fa-minus' data-list='" +n+ "' id='eliminaDetalle'></i></button></span><span id='titShow'>" + titDetModal + "</span></li>" );   
        //Agregar item a la lista
        $("#listaDetalles").append($item);
        //Cerrar modal
        $('#modal-form').modal('toggle');
        //Vacia los campos del formulario del modal
        $( "#titDetalleModal" ).val('');
        tinymce.activeEditor.setContent('');

    }

});
//Funcion para agregar detalles a la lista

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
    console.log(formData);
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