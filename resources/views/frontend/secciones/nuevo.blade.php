@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Secciones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_secciones') }}">Lista de Secciones</a>
            </li>
            <li class="active">
                <strong><a>Nueva Sección</a></strong>
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
                <h5>Nueva Sección</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nueva_seccion', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        	{!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-10">
                            {!! Form::number('orden', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_secciones') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection