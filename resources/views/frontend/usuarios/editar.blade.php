@extends('frontend.layouts.app')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Formulario de Edición de Usuario</h5>
            </div>
            <div class="ibox-content">
                <form method="get" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10"><input type="text" name="name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Correo Electrónico</label>
                        <div class="col-sm-10"><input type="text" name="email" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="password"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Rol de Usuario</label>
                        <div class="col-sm-10">
	                        <select class="form-control" name="rol" id="rol">
					        	<option value="1">Admin</option>
					        	<option value="2">Gestor Web</option>
					        	<option value="3">Gestor de Contenidos</option>
					        </select>
                    	</div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ route('lista_usuario') }}" class="btn btn-white" type="submit">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection