@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Mundo</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_mundos') }}">Lista de Mundos</a>
            </li>
            <li class="active">
                <strong><a>Editar Mundo</a></strong>
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
                <h5>Editar Mundo</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_mundo', $mundo], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        	{!! Form::text('nombre', $mundo->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_mundos') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection