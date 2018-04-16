@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Página</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_paginas') }}">Lista de Páginas</a>
            </li>
            <li class="active">
                <strong><a>Editar Página</a></strong>
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
                <h5>Editar Página</h5>
                <span class="pull-right">Link: <a target="_blank" href="{{ URL::to('/') }}/{{$pagina->id}}/{{$pagina->slug}}">{{ URL::to('/') }}/{{$pagina->id}}/{{$pagina->slug}}</a></span>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_pagina', $pagina], 'method' => 'PUT']) !!}

                <div class="row">
                    <div class="col-sm-6 b-r">
                        <div class="form-group"><label>Titulo</label> 
                            {!! Form::text('titulo',$pagina->titulo, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Subtítulo</label> 
                            {!! Form::text('subtitulo',$pagina->subtitulo,  ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 b-r">
                        <div class="form-group"><label>Sección</label> 
                            {!! Form::select('id_seccion', $lista_secciones, $pagina->id_seccion, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Tipo de Página</label> 
                            {!! Form::select('tipo_pagina', ['1' => '1', '2' => '2', '3' => '3'], $pagina->tipo_pagina, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>   
                </div>
                <div class="hr-line-dashed"></div>
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Contenido</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">
                        Sliders</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Multimedia</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Estilos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-sm-4 b-r">
                                    <div class="form-group">
                                        <label>Título 1</label>
                                        {!! Form::text('titulo_1',$pagina->titulo_1, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Contenido 1</label>
                                        {!! Form::textarea('contenido_1', $pagina->contenido_1, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4 b-r">
                                    <div class="form-group">
                                        <label>Título 2</label>
                                        {!! Form::text('titulo_2',$pagina->titulo_2, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Contenido 2</label>
                                        {!! Form::textarea('contenido_2', $pagina->contenido_2, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Título 3</label>
                                        {!! Form::text('titulo_3',$pagina->titulo_3, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Contenido 3</label>
                                        {!! Form::textarea('contenido_3', $pagina->contenido_3, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <a data-toggle="modal" class="btn btn-sm btn-info" href="#modal-add-slider">Agregar Slide</a>

                                <ul class="list-group clear-list m-t" id="listaSliders">
                                    @foreach($pagina->sliders as $sld)
                                    <li class='list-group-item' id='sliderlist-{{$sld->id}}'>
                                        <span class='pull-right'>
                                            <button class='btn btn-xs btn-primary'>
                                                <i class='fa fa-pencil' data-campo="slider" data-item-id='{{$sld->id}}' id='editaSlider'></i>
                                            </button> 
                                            <button class='btn btn-xs btn-danger'>
                                                <i class='fa fa-trash' data-item-id='{{$sld->id}}' data-campo='slider' data-num='{{$sld->id}}' id='eliminaItem'></i>
                                            </button>
                                        </span>
                                        <span id='titShow'>{{$sld->titulo or 'Slide sólo con Imagen'}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-6 b-r">
                                    <div class="form-group">
                                        <label>Video</label>
                                        {!! Form::text('video',$pagina->video, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre del Link</label>
                                        {!! Form::text('link',$pagina->link, ['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Url del Link</label>
                                        {!! Form::text('url_link',$pagina->url_link, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-sm-3 b-r">
                                    <div class="form-group">
                                        <label>Color</label>
                                        {!! Form::text('color',$pagina->color, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-3 b-r">
                                    <div class="form-group">
                                        <label>Color de Fuente</label>
                                        {!! Form::text('color_fuente',$pagina->color_fuente, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-3 b-r">
                                    <div class="form-group">
                                        <label>Color de Título</label>
                                        {!! Form::text('color_titulo',$pagina->color_titulo, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Color de Línea</label>
                                        {!! Form::text('color_linea',$pagina->color_linea, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>

                <a href="{{ route('lista_paginas') }}" class="btn btn-white" type="submit">Cancelar</a>
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
                            <div class="form-group"><label>Texto Corto</label>
                                <textarea class="form-control" id="texto_corto" name="texto_corto"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="slider">
                            <input type="hidden" class="form-control" id="id_pagina" name="id_pagina" value="{{$pagina->id}}">
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
                            <div class="form-group"><label>Texto Corto</label>
                                <textarea class="form-control" id="editTexto_cortoModal" name="editTexto_cortoModal"></textarea> 
                            </div>
                            <input type="hidden" class="form-control" id="tipo" name="tipo" value="slider">
                            <input type="hidden" class="form-control" id="id_pagina" name="id_pagina" value="{{$pagina->id}}">
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
            url: '{{ URL::to("/") }}/frontend/paginas/guardar_item',
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
                        case 'F':
                            toastr.clear();
                            toastr.error("El archivo no posee formato de imagen", "TOULOUSE");
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

    //Funcion para obtener slider de la lista
    $(document).on('click', '#editaSlider', function(e) {
        e.preventDefault();
        var a = $(this).data('item-id');
        var campo = $(this).data('campo');

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/paginas/obtener_item/'+campo+'/'+a,  
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
                        //Si viene null el texto corto - define una variable vacia para imprimir sobre el textarea
                        var textCorto = data['texto_corto'];
                        if (data['texto_corto'] == null) {
                            textCorto = '';
                        }
                        tinyMCE.get('editTexto_cortoModal').setContent(textCorto);
                        var htmlImg = $('<img id="imgModalShow" src="{{ URL::to('/') }}/img/paginas/'+data['imagen']+'" style="width:100%;">');
                        htmlImg.appendTo('#imgDiv');

                        $('#modal-form-edit-slider').modal('show');
                        break;
                }
            },
            //si ha ocurrido un error
            error: function(e){
                toastr.clear();
                toastr.error("Ha ocurrido un error al obtener datos del ítem.", "TOULOUSE");
            }
        });
        
    });
    //Funcion para obtener slider de la lista

    //Funcion para guardar o procesar el slider
    $('#form-edit-slider').submit(function(e) {
        e.preventDefault();
        var modalName = $(this).data('modname');
        
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: '{{ URL::to("/") }}/frontend/paginas/editar_item',
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
                        case 'F':
                            toastr.clear();
                            toastr.error("El archivo no posee formato de imagen", "TOULOUSE");
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

});
</script>
@endsection