@extends('frontend.layouts.app')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Configuración General</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
            <li class="active">
                <strong><a>Configuracion General</a></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <br><br>
            <button class="btn btn-sm btn-primary">Guardar</button>    
        </div>
        
    </div>
</div>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Información</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"> Logos e imagenes</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Colores</a></li>
                <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Redes Sociales</a></li>

            </ul>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Datos o información general del sitio web.</p>
                                <form role="form">
                                    <div class="form-group"><label>Nombre del Sitio</label> <input type="text" placeholder="Nombre" class="form-control"></div>
                                    <div class="form-group"><label>Descripción del Sitio</label> <input type="text" placeholder="Descripcion" class="form-control"></div>
                                </form>
                            </div>
                            <div class="col-sm-6"><h4></h4>
                                <p></p><br>
                                <div class="form-group"><label>Email</label> <input type="text" placeholder="Enter email" class="form-control"></div>
                                <div class="form-group"><label>Password</label> <input type="text" placeholder="Password" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        <strong>Donec quam felis</strong>

                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                            and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                            sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection