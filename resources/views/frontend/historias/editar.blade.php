@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Historia</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_historias') }}">Lista de Historias</a>
            </li>
            <li class="active">
                <strong><a>Editar Historia</a></strong>
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
                <h5>Editar Ítem</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_historia', $historia], 'method' => 'PUT', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Título</label> 
                            {!! Form::text('titulo', $historia->titulo, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Introducción</label> 
                            {!! Form::text('introduccion', $historia->introduccion, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Orden</label> 
                            {!! Form::number('orden', $historia->orden, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Imagen</label>
                            {!! Form::file('imagen'); !!} 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        @if($historia->imagen)
                            <label>Imagen Actual</label>
                            <img style="width: 100%;" src="{{ URL::to('/') }}/img/historias/{{$historia->imagen}}" >
                        @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-8 b-r">
                        <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-subitem">Agregar Modal Interno</a>
                        <ul class="list-group clear-list m-t" id="listaSubitems">
                            @foreach($historia->internas as $int)
                            <li class='list-group-item' id='sliderlist-{{$int->id}}'>
                                <span class='pull-right'>
                                    <button class='btn btn-xs btn-primary'>
                                        <i class='fa fa-pencil' data-campo="slider" data-item-id='{{$int->id}}' id='editaHistoria'></i>
                                    </button> 
                                    <button class='btn btn-xs btn-danger'>
                                        <i class='fa fa-trash' data-item-id='{{$int->id}}' data-campo='slider' data-num='{{$int->id}}' id='eliminaItem'></i>
                                    </button>
                                </span>
                                <span id='titShow'>{{$int->titulo}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Color</label> 
                            {!! Form::text('color', $historia->color, ['class'=>'form-control', 'maxlength' => 6]) !!}
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_historias') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--Formulario de Agregar Subitem-->
<div id="modal-add-subitem" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-add-subitem" id="form-add-subitem" data-modname="modal-add-subitem" enctype="multipart/form-data" method="POST">
                            <div class="form-group"><label>Agregar Imágen</label> 
                                <input name="imagen" data-nombre="imagen" id="imagen" type="file" />
                            </div>
                            <div class="form-group"><label>Título</label> 
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>
                            <div class="form-group"><label>Contenido</label>
                                <textarea class="form-control" id="contenido" name="contenido"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="id_historia" name="id_historia" value="{{$historia->id}}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear Subitem">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Agregar Subitem-->

<!--Formulario de Editar Subitem-->
<div id="modal-form-edit-subitem" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form name="form-edit-subitem" id="form-edit-subitem" data-modname="modal-form-edit-subitem" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="itemId" name="itemId">
                            <div class="form-group"><label>Editar Imágen</label> 
                                <input name="editImagenModal" id="editImagenModal" type="file" />
                            </div>
                            <div class="form-group" id="imgDiv"></div>
                            <div class="form-group"><label>Título</label> 
                                <input type="text" class="form-control" id="editTituloModal" name="editTituloModal">
                            </div>
                            <div class="form-group"><label>Contenido</label>
                                <textarea class="form-control" id="editContenidoModal" name="editContenidoModal"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="id_historia" name="id_historia" value="{{$historia->id}}">
                            <div class="form-group">
                                <button class="btn btn-primary" id="editarSlider">Editar Subitem</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Formulario de Editar Subitem-->

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

//Funciones para subitems
$(document).ready(function() {


    //Funcion para guardar o procesar el item
    $('#form-add-subitem').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/historias/guardar_item',
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
                            $('#form-add-subitem')[0].reset();
                            //Cierra el modal
                            var $item = $( "<li class='list-group-item' id='sliderlist-" +data.trim()+ "'><span class='pull-right'><button class='btn btn-xs btn-primary'><i class='fa fa-pencil' data-campo='slider' data-item-id='" +data.trim()+ "' id='editaHistoria'></i></button> <button class='btn btn-xs btn-danger'><i class='fa fa-trash' data-item-id='" +data.trim()+ "' data-num='" +data.trim()+ "' id='eliminaItem'></i></button></span><span id='titShow'>" + formData.get("titulo") + "</span></li>" );
                            //Agregar item a la lista
                            $("#listaSubitems").append($item);

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
    //Funcion para guardar o procesar el item

    //Funcion para obtener item de la lista
    $(document).on('click', '#editaHistoria', function(e) {
        e.preventDefault();
        var a = $(this).data('item-id');

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/historias/obtener_item/'+a,  
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
                        tinyMCE.get('editContenidoModal').setContent(data['contenido']);
                        var htmlImg = $('<img id="imgModalShow" src="{{ URL::to('/') }}/img/historias/'+data['imagen']+'" style="width:100%;">');
                        htmlImg.appendTo('#imgDiv');

                        $('#modal-form-edit-subitem').modal('show');
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
    //Funcion para obtener item de la lista

    //Funcion para guardar o procesar el subitem
    $('#form-edit-subitem').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/historias/editar_item',
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
    //Funcion para guardar o procesar el subitem

    //Funcion para eliminar la imagen
    $(document).on('click', '#eliminaItem', function(e) {
        e.preventDefault();
        var id = $(this).data('item-id');
        var num = $(this).data('num');

        $('#idDel').val(id);
        $('#listNum').val(num);

        $('#modal-eliminar-item').modal('show');    
    });
    //Funcion para eliminar la imagen

    //Funcion para eliminar la imagen
    $(document).on('click', '#deleteItem', function(e) {
        e.preventDefault();
        var id = $('#idDel').val();
        var num = $('#listNum').val();

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/historias/eliminar_item/'+id,  
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
                        $('#listNum').val('');
                        $('#sliderlist-'+num).remove();

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

});
//Funciones para subitems

</script>
@endsection