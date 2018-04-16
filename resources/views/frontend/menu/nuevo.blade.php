@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Menú</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_menu') }}">Lista de Menú</a>
            </li>
            <li class="active">
                <strong><a>Nueva Menú</a></strong>
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
                <h5>Formulario de Registro de Menu</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => 'nuevo_menu', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        	{!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Url</label>
                        <div class="col-sm-10">
                        	{!! Form::text('url', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-10">
                            {!! Form::text('orden', null, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Sección</label>
                        <div class="col-sm-10">
	                        {!! Form::select('id_seccion', $lista_secciones, null, ['class'=>'form-control','required']) !!}
                    	</div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_menu') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Registrar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection