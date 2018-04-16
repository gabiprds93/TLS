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
                <strong><a>Nuevo Egresado</a></strong>
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
                <h5>Nuevo Egresado</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nuevo_egresado', 'method' => 'POST']) !!}
                <div class="row">
                    <div class="col-sm-6 b-r">
                        <div class="form-group"><label>Nombres</label> 
                            {!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group"><label>Carrera</label> 
                            {!! Form::select('id_carrera', $lista_carreras, null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_egresados') }}" class="btn btn-white" type="submit">Cancelar</a>
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