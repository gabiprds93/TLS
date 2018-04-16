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
                <strong><a>Editar Menú</a></strong>
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
                <h5>Editar Menú</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_menu', $menu], 'method' => 'PUT']) !!}
                <div class="row">
                    <div class="col-sm-6 b-r">
                        <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                            {!! Form::text('nombre', $menu->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Url</label>
                            {!! Form::text('url', $menu->url, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group"><label class="col-sm-2 control-label">Orden</label>
                            {!! Form::number('orden', $menu->orden, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Sección</label>
                            {!! Form::select('id_seccion', $lista_secciones, $menu->id_seccion, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group">
                            <label>Sublink 1</label>
                            {!! Form::text('sublink_1', $menu->sublink_1, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Url 1</label>
                            {!! Form::text('url_1', $menu->url_1, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Sublink 2</label>
                            {!! Form::text('sublink_2', $menu->sublink_2, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Url 2</label>
                            {!! Form::text('url_2', $menu->url_2, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Sublink 3</label>
                            {!! Form::text('sublink_3', $menu->sublink_3, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Url 3</label>
                            {!! Form::text('url_3', $menu->url_3, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-sm-4 b-r">
                        <div class="form-group">
                            <label>Sublink 4</label>
                            {!! Form::text('sublink_4', $menu->sublink_4, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Url 4</label>
                            {!! Form::text('url_4', $menu->url_4, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Sublink 5</label>
                            {!! Form::text('sublink_5', $menu->sublink_5, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Url 5</label>
                            {!! Form::text('url_5', $menu->url_5, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                

                <div class="hr-line-dashed"></div>
                <a href="{{ route('lista_menu') }}" class="btn btn-white" type="submit">Cancelar</a>
                <button class="btn btn-primary" type="submit">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection