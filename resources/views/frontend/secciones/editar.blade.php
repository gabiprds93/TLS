@extends('frontend.layouts.app')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Formulario de Edición de Sección</h5>
            </div>
            <div class="ibox-content">
                {!! Form::open(['route' => ['actualiza_seccion', $seccion], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                        	{!! Form::text('nombre', $seccion->nombre, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-10">
                            {!! Form::number('orden', $seccion->orden, ['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_secciones') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection