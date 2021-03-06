@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_articulos') }}">Lista de Artículos</a>
            </li>
            <li class="active">
                <strong><a>Editar Artículo</a></strong>
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
                <h5>Editar Artículo</h5>
                <span class="pull-right">Link: <a target="_blank" href="{{ URL::to('/') }}/blog/{{$articulo->id}}/{{$articulo->slug}}">{{ URL::to('/') }}/blog/{{$articulo->id}}/{{$articulo->slug}}</a></span>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_articulo', $articulo], 'method' => 'PUT', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Título</label> 
                            {!! Form::text('titulo', $articulo->titulo, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Descripción Breve</label> 
                            {!! Form::text('introduccion', $articulo->introduccion, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4 b-r">
                        <div class="form-group"><label>Autor</label> 
                            {!! Form::number('autor', $articulo->autor, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group"><label>Cargo</label> 
                            {!! Form::text('cargo', $articulo->cargo, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group"><label>Imagen</label>
                            {!! Form::file('imagen'); !!} 
                        </div>
                        @if($articulo->imagen)
                            <label>Imagen Actual</label>
                            <img style="width: 100%;" src="{{ URL::to('/') }}/img/blog/{{$articulo->imagen}}" >
                        @endif
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group"><label>Contenido</label> 
                            {!! Form::textarea('contenido', $articulo->contenido, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_articulos') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

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


</script>
@endsection