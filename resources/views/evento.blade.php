<?php
setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
$dbFecha = $dbFecha = str_replace("/","-",$evento[0]->fecha);
$fecha = strftime('%d %B %Y',strtotime($dbFecha));
$hora = date('h:i a', strtotime($evento[0]->hora));
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
        <div class="primeraSeccionContainer">
			<!--*********BREADCRUMS REUTILIZABLE***********-->
			<div class="breadCrumbs">
				<a href="{{ URL::to('/') }}/#eventos">Eventos</a>
				<a >{{$evento[0]->nombre}}</a>
			</div>
			<!--*******************************************-->

			<!--<div class="titleMobile">
				<div class="up">
					<a>Animación Digital<div class="subLine"></div></a>
				</div>
			</div>-->
			<!--AD = Animación Digital-->
			<div class="adSlider">
				<div class="sliderContainer">
					<div class="adSliderSlick">
						<div class="adSlideItem" style="background: url('{{ URL::to('/') }}/{{$evento[0]->eventos_imagenes[0]->imagen}}');">
							<div class="slideContent">
								<div class="slideTittle">
									<h2>
										<span class="parent">
											<span class="line lineGray">
											</span>
											<span class="letter letterPink">{{$evento[0]->nombre}}
											</span>
										</span>
									</h2>
								</div>
								<div class="slideBox linePink letterWhite">
									<p style="border-bottom: 5px solid white">Fecha: {{$fecha}}</p>
									<p>Hora: {{$hora}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="descripciones">
				<div class="descripcion">
					<span></span>
					<div class="descripcionItem">
						<h2>¿De qué trata el taller?</h2>
						{!!$evento[0]->que_trata_taller!!}
					</div>
				</div>
				<div class="descripcion">
					<span></span>
					<div class="descripcionItem">
						<h2>Contenido</h2>
						{!!$evento[0]->contenido!!}
					</div>
				</div>
				<div class="descripcion">
					<span></span>
					<div class="descripcionItem">
						<h2>Expositores</h2>
						{!!$evento[0]->expositores!!}
					</div>
				</div>
			</div>
		</div>
		<div class="segundaSeccionContainer showContainer">
			<div class="moduloUp">
				<h2>Sede del evento</h2>
				<div class="moduloImg">
					<img src="assets/img/alumnoEgresado/Line.svg" alt="">
				</div>
				<div class="textModul">
					<h2>{{$evento[0]->sede->nombre}}</h2>
					<p>{{$evento[0]->sede->direccion}}</p>
				</div>
			</div>
			<div class="mapMainContainer">
				<div class="mapContainer">
					<div id="map"></div>
				</div>
			</div>
		</div>
		<div class="cuartaSeccionContainer">
			<h2>¿Dónde se realiza el taller?</h2>
			<form action="">
				<div class="inputs">
					<div class="inputsLeft">
						<div class="input">
							<label for="">Nombre</label>
							<input type="text">
						</div>
						<div class="input">
							<label for="">Teléfono</label>
							<input type="text">
						</div>
					</div>
					<div class="inputsRight">
						<div class="input">
							<label for="">Apellidos</label>
							<input type="text">
						</div>
						<div class="input">
							<label for="">E-mail</label>
							<input type="text">
						</div>
					</div>
				</div>
				<div class="checkBoxCont">
					<input type="checkbox">
					<p>Acepto los <a class="cursor">Términos y Condiciones</a></p>
				</div>
				<div class="btnContac">
					<button>Asistir</button>
				</div>
			</form>
		</div>
        @include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>