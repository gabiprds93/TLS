<?php use App\Http\Controllers\HomeController; ?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	@include('layouts.head')
</head>
<body style="position: relative;">
	@include('layouts.terminos-condiciones')
	<div class="fullpageMainContainer" style="position: relative;">
		@include('layouts.header')
		@include('layouts.menu-responsive')
		<main id="fullpage">
			<div id="section0" class="section fp-noscroll">
				<div class="portadaSection" style="display: flex;align-items: center;justify-content: center;width: 100%;height: 100%;">
					<div class="portadaContainer" style="background: {{$secciones[0]->contenidos[0]->color_contenido or ''}}">
						@if($secciones[0]->contenidos[0]->video)
							<?php 
								$youtubeVideo = HomeController::getVideoIdYoutube($secciones[0]->contenidos[0]->video);
							?>
							 <div class="videoContainer" data-videoid="{!! $youtubeVideo !!}"></div>
						@else
							@if(count($secciones[0]->contenidos[0]->imagenes) > 0 )
								@foreach($secciones[0]->contenidos[0]->imagenes as $se)
									<img src="{{ $se->imagen }}" alt="">
								@endforeach
							@else
								<span>La sección de Portada no tiene imagen definida</span>
							@endif
						@endif
					</div>
				</div>
			</div>
			@include('layouts.porque-tls')
			@include('layouts.admision')
			@include('layouts.tls-lab')
			@include('layouts.carreras')
			@include('layouts.campus-sedes')
			@include('layouts.empresa')
			@include('layouts.incubadora')
			@include('layouts.educacion-continua')
			@include('layouts.eventos')
			@include('layouts.contacto')
		</main>
		@include('layouts.footer')
	</div> 
	@include('layouts.scripts')
</body>
</html>