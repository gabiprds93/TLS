@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Sede</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('home_cms') }}">Inicio</a>
            </li>
            <li>
                <a href="{{ route('lista_sedes') }}">Lista de Sedes</a>
            </li>
            <li class="active">
                <strong><a>Nueva Sede</a></strong>
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
                <h5>Edición de Sede</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_sede', $sede], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        	{!! Form::text('nombre', $sede->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Dirección</label>
                        <div class="col-sm-10">
                            {!! Form::text('direccion', $sede->direccion, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Latitud</label>
                        <div class="col-sm-10">
                            {!! Form::text('latitud', $sede->latitud, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Longitud</label>
                        <div class="col-sm-10">
                            {!! Form::text('longitud', $sede->longitud, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Imagen</label>
                        <div class="col-sm-10">
                            <input type="file" name="imagen">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            @if($sede->imagen)
                            <label>Imagen Actual</label>         
                            <img style="width: 100%" src="{{ URL::to('/') }}/img/sedes/{{$sede->imagen}}">
                            @endif
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_sedes') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection