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
                <strong><a>Nueva Página</a></strong>
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
                <h5>Nueva Página</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nueva_pagina', 'method' => 'POST', 'files' => true]) !!}
                <div class="row">
                    <div class="col-sm-6 b-r">
                        <div class="form-group"><label>Título</label> 
                            {!! Form::text('titulo', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Subtitulo</label> 
                            {!! Form::text('subtitulo', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group"><label>Sección</label> 
                            {!! Form::select('id_seccion', $lista_secciones, null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label>Tipo de Página</label> 
                            {!! Form::select('tipo_pagina', ['1' => '1', '2' => '2', '3' => '3'], null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="hr-line-dashed"></div>

                <a href="{{ route('lista_paginas') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Registrar</button>
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