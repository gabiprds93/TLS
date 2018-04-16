<!DOCTYPE html>
<html lang="es-ES">
<head>
	@include('layouts.head')
	<?php use App\Http\Controllers\HomeController; ?>
</head>
<body style="position: relative;">
	@include('layouts.terminos-condiciones')
	<div class="fullpageMainContainer" style="position: relative;">
		@include('layouts.header')
		@include('layouts.menu-responsive')
		<main id="fullpage">
			<div id="section0" class="section fp-noscroll">
				<div class="slide slideScroll fp-noscroll">
					<div class="sectionContainer" style="background: #{{ $pagina[0]->color }}">
						<div class="fakeHeader"></div>
						<div class="content fiftyFifty">
							<div class="textMainContainer">
								<div class="textContainer">
									<div class="tittle">
										<div class="pseudoBreadCrumb">
											<h5 class="letterWhite light italic"><a href="#incubadora/" style="text-decoration: none;color:#{{ $pagina[0]->color_fuente }}" class="letterWhite">{{$pagina[0]->seccion->nombre}} /</a> <span class="letterYellow">{{$pagina[0]->titulo}}</span></h5>
										</div>
										<div class="tittlePrincipal">
											<h2 style="color:#{{ $pagina[0]->color_titulo }}">{{$pagina[0]->subtitulo}}</h2>
										</div>
										<div class="link">
											<span class="parentLink"><span class="lineLink"></span><a href="#contacto" class="letter" style="color:#{{ $pagina[0]->color_titulo }}">Inscríbete</a></span><img src="assets/img/extended.svg" alt="">
										</div>
									</div>

									<div class="tabsContainer">
										<div class="tabsTittle letterWhite">
											<p class="tabActive growUpTab1" style="color:#{{ $pagina[0]->color_fuente }}" >{{$pagina[0]->titulo_1}}</p>
											<p class="growUpTab2" style="color:#{{ $pagina[0]->color_fuente }}" >{{$pagina[0]->titulo_2}}</p>
											<p class="growUpTab3" style="color:#{{ $pagina[0]->color_fuente }}" >{{$pagina[0]->titulo_3}}</p>
										</div>
										<div class="tabsContent">
											<div class="contenido tabContent1 growUpTabText1" style="color:#{{ $pagina[0]->color_fuente }}">
												{!! $pagina[0]->contenido_1 or '' !!}
											</div>
											<div class="contenido tabContent2 growUpTabText2" style="color:#{{ $pagina[0]->color_fuente }}">
												{!! $pagina[0]->contenido_2 or '' !!}
											</div>
											<div class="contenido tabContent3 growUpTabText3" style="color:#{{ $pagina[0]->color_fuente }}">
												{!! $pagina[0]->contenido_3 or '' !!}
											</div>
										</div>
									</div>
								</div>
							</div>
							@if($pagina[0]->video)
							<?php 
								$youtubeVideo = HomeController::getVideoIdYoutube($pagina[0]->video);
							?>
							 <div class="videoexist" data-videoid="{!! $youtubeVideo !!}"></div>
							@else
							<div class="imgMainContainer">
								<div class="slideTlsLab">
									@foreach ($pagina[0]->sliders as $sld)
									<div class="slideTlsLabItem">
										<img src="{{ URL::to('/') }}/img/paginas/{{$sld->imagen}}" alt="">
									</div>
									@endforeach
								</div>
							</div>

							
							@endif
							
						</div>
						<div class="fakeFooter"></div>
					</div>
				</div>
			</div>
		</main>
		@include('layouts.footer')
	</div> 
	@include('layouts.scripts')
</body>
</html>