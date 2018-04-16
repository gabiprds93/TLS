<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer aeSMainContainer noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<div class="primeraSeccionContainer">
			<!--*********BREADCRUMS REUTILIZABLE***********-->
			<div class="breadCrumbs">
				<a href="">{{$pagina[0]->seccion->nombre}}</a>
				<a style="color:#{{$pagina[0]->color_fuente}}">{{$pagina[0]->titulo}}</a>
			</div>
			<!--*******************************************-->

			<div class="imgFondo" style="background: url('{{ URL::to('/') }}/img/paginas/{{$pagina[0]->sliders[0]->imagen or '' }}')">
				<!--<img src="assets/img/teens_fondo.png" alt="">-->
				<div class="segundaSeccionContainer incuSeccionContainer">
					<div class="adText">
						<p style="font-size: 1.3rem;">
						{{$pagina[0]->subtitulo or ''}}</p>
					</div>
					<div class="descripciones">
						<div class="descripcion">
							<span style="background:#{{$pagina[0]->color_linea}}"></span>
							<div class="descripcionItem">
								<h2 style="color:#{{$pagina[0]->color_fuente}}">{{$pagina[0]->titulo_1 or ''}}</h2>
								{!! $pagina[0]->contenido_1 or '' !!}
							</div>
						</div>
						<div class="descripcion">
							<span style="background:#{{$pagina[0]->color_linea}}"></span>
							<div class="descripcionItem">
								<h2 style="color:#{{$pagina[0]->color_fuente}}">{{$pagina[0]->titulo_2 or ''}}</h2>
								{!! $pagina[0]->contenido_2 or '' !!}
							</div>
						</div>
						<div class="descripcion">
							<span style="background:#{{$pagina[0]->color_linea}}"></span>
							<div class="descripcionItem">
								<h2 style="color:#{{$pagina[0]->color_fuente}}">{{$pagina[0]->titulo_3 or ''}}</h2>
								{!! $pagina[0]->contenido_3 or '' !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="cuartaSeccionContainer" style="background:#{{$pagina[0]->color_fuente}}">
			<h2>Contacto</h2>
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
					<button>Comenzar ahora</button>
				</div>
			</form>
		</div>
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>