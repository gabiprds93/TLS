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
		<div class="primeraSeccionContainer cursosSeccionContainer">
			<!--*********BREADCRUMS REUTILIZABLE***********-->
			<div class="breadCrumbs ecCBread">
				<a href="">{{$pagina[0]->seccion->nombre}}</a>
				<a style="color:#{{$pagina[0]->color}}">{{$pagina[0]->titulo}}</a>
			</div>
			<!--*******************************************-->

			<div class="titleMobile">
				<div class="up">
					<a>{{$pagina[0]->titulo}}<div class="subLine"></div></a>
				</div>
			</div>
			<!--AD = Animación Digital-->
			<div class="adSlider">
				<div class="sliderContainer">
					<div class="adSliderSlick">
						<!--Slider-->
						@if(count($pagina[0]->sliders) > 0)
							@foreach($pagina[0]->sliders as $sld)
							<div class="adSlideItem" style="background: url('{{ URL::to('/') }}/img/paginas/{{$sld->imagen}}')">
								<div class="slideContent">
									<div class="slideTittle">
										<h2><span class="parent"><span class="line lineGray"></span><span class="letter {{$pagina[0]->color_titulo or 'letterSkyBlue'}}" style="color: #{{$pagina[0]->color_titulo}}">{{$sld->titulo}}</span></span></h2>
									</div>
									@if($sld->texto_corto)
									<div class="slideBox {{$pagina[0]->color or 'lineCeleste'}} letterWhite" style="background: #{{$pagina[0]->color}}">
										{!!$sld->texto_corto!!}
									</div>
									@endif
								</div>
							</div>
							@endforeach
						@endif
						<!--Slider-->
					</div>
				</div>
			</div>
			<div class="adText ecCText">
				
			</div>
			<div class="descripciones">
				<div class="descripcion">
					<span style="background:#{{$pagina[0]->color_linea}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$pagina[0]->color_titulo}}">{{$pagina[0]->titulo_1 or ''}}</h2>
						<!--<div style="color:#{{$pagina[0]->color_fuente}}">{!! $pagina[0]->contenido_1 or '' !!}</div>-->
						<div>{!! $pagina[0]->contenido_1 or '' !!}</div>
					</div>
				</div>
				<div class="descripcion">
					<span style="background:#{{$pagina[0]->color_linea}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$pagina[0]->color_titulo}}">{{$pagina[0]->titulo_2 or ''}}</h2>
						<!--<div style="color:#{{$pagina[0]->color_fuente}}">{!! $pagina[0]->contenido_2 or '' !!}</div>-->
						<div>{!! $pagina[0]->contenido_2 or '' !!}</div>
					</div>
				</div>
				<div class="descripcion">
					<span style="background:#{{$pagina[0]->color_linea}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$pagina[0]->color_titulo}}">{{$pagina[0]->titulo_3 or ''}}</h2>
						<!--<div style="color:#{{$pagina[0]->color_fuente}}">{!! $pagina[0]->contenido_3 or '' !!}</div>-->
						<div>{!! $pagina[0]->contenido_3 or '' !!}</div>
					</div>
				</div>
			</div>
		</div>
		@if($pagina[0]->link)
		<div class="terceraSeccionContainer">
			<a href="{{$pagina[0]->url_link}}">{{$pagina[0]->link}}</a>
		</div>
		@endif
		<div class="cuartaSeccionContainer" style="background:#{{$pagina[0]->color}}">
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
		@if($sigPagina && $antPagina)
		<div class="quintaSeccionContainer">
			<div class="left" style="background: url('{{ URL::to('/') }}/img/paginas/{{$antPagina->imagen_referencial or '' }}')">
				<a href="{{ URL::to('/') }}/{{ $antPagina->id }}/{{ $antPagina->slug }}">{{$antPagina->titulo}}</a>
			</div>
			<div class="right">
				<a href="{{ URL::to('/') }}/{{ $sigPagina->id }}/{{ $sigPagina->slug }}">{{$sigPagina->titulo}}</a>
			</div>
		</div>
		@endif
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>