<?php use App\Http\Controllers\HomeController; ?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    <div class="fullpageMainContainer">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<main id="fullpage">
			<div id="" class="section">
				<!--Slide-->
				@foreach($seccion[0]->contenidos as $cont)
				<div class="slide">
					<div class="sectionContainer bgFuxia">
						<div class="fakeHeader"></div>
						<div class="content fiftyFifty"><!--porcentajes de los lados con respecto al requerimiento-->
							<div class="textMainContainer">
								<div class="textContainer portada">
									<div class="tittle">
										<div class="pseudoBreadCrumb">
											<div class="breadCrumbs">
												<a href="#">{{$seccion[0]->nombre}}</a>
												<a>{{$cont->titulo}}</a>
											</div>
										</div>
										<div class="tittlePrincipal">
											<h2>{{$cont->subtitulo}}</h2>
										</div>
										<!--Seccion de LINKS Superiores-->
										@if($cont->posicion_links == 'A')
											<div class="link" style="color:#{{ $cont->color_link }}">
											@foreach ($cont->links as $lnk)
											    <span class="parentLink"><span class="lineLink" style="background:#{{ $cont->color_sub_link }}"></span><a href="{{$lnk->url}}" class="letterBlack letter">{{$lnk->nombre}}</a></span>
											@endforeach
										</div>
										@endif
										<!--Seccion de LINKS Superiores-->
										<!--Seccion de TABS-->
										@if(count($cont->detalles) > 0)
											<div class="tabsContainer">
												<div class="tabsTittle" style="color:#{{ $cont->color_detalle }}">
													@foreach ($cont->detalles as $det)
														<p class="{{ $loop->first ? 'tabActive' : '' }} tabContenedor" style="color:#{{ $co->color_detalle }}" data-clase="convenio" data-id='{{$det->id}}'">{{$det->titulo}}</p>
													@endforeach
												</div>
												<div class="tabsContent" style="height: 0px;">
													@foreach ($cont->detalles as $det)
														<div class="contenido tabContent{{$det->id}} trasladoTabText" style="color:#{{ $cont->color_detalle }}" data-id='{{$det->id}}'">
															{!! $det->detalle !!}
														</div>
													@endforeach
												</div>
											</div>
										@endif
										<!--Seccion de TABS-->
										<!--Seccion de LINKS inferiores-->
										@if($cont->posicion_links == 'D')
											<div class="link" style="position: relative;top: -4.5rem;color:#{{ $cont->color_link }}">
											@foreach ($cont->links as $lnk)
											    <span class="parentLink"><span class="lineLink" style="background:#{{ $cont->color_sub_link }}"></span><a href="{{$lnk->url}}" class="letterBlack letter">{{$lnk->nombre}}</a></span>
											@endforeach
										</div>
										@endif
										<!--Seccion de LINKS inferiores-->
										<!--Seccion de Pie de Contenido-->
										<div class="link" style="position: relative;top: -4rem;color:#{{ $cont->color_detalle }}">
											{!! $cont->pie_contenido !!}
										</div>
										<!--Seccion de Pie de Contenido-->
									</div>
								</div>
							</div>
							<div class="imgMainContainer">
								@if(count($cont->imagenes) > 0)
									<div class="sliderLabContainer">
										<div class="slideTlsLab">
											@foreach ($cont->imagenes as $ima)
											<div class="slideTlsLabItem">
												<img src="{{$ima->imagen}}" alt="">
											</div>
											@endforeach
										</div>
									</div>
								@else
									@if(count($cont->video) > 0)
										<?php 
											$youtubeVideo = HomeController::getVideoIdYoutube($cont->video);
										?>
										 <div class="videoexist" data-videoid="{!! $youtubeVideo !!}"></div>
									@endif
								@endif
							</div>
						</div>
						<div class="fakeFooter"></div>
					</div>
				</div>
				<!--Slide-->
				@endforeach
			</div>
		</main>
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>