<?php use App\Http\Controllers\HomeController; ?>
<div id="section1" class="section">
	@if(count($secciones[5]->contenidos) > 0)
		@foreach($secciones[5]->contenidos as $co)
		<div class="slide slideScroll fp-noscroll">
			<?php 
			if ($co->imagen_fondo) {
				$fondo = "background: url('/img/contenidos/$co->imagen_fondo')";
				$clase = "tlsLabBG";
			}else{
				$fondo = "background: #$co->color_contenido";
				$clase = "";
			}
			?>
			<div class="sectionContainer {{$clase}}" style="{{$fondo}}">
				<div class="fakeHeader"></div>
				@if(count($co->video) > 0)
				<?php 
					$youtubeVideo = HomeController::getVideoIdYoutube($co->video);
				?>
				<div class="videoContainer" data-videoid="{!! $youtubeVideo !!}"></div>
				@endif
				<div class="content fiftyFifty">
					<div class="textMainContainer">
						<div class="textContainer portada">
							<div class="tittle">
								<!--Seccion de Migaja o Imagen de APP -->
								@if($co->imagen_app)
									<img src="/img/contenidos/{{$co->imagen_app}}" alt="">
								@else
									<div class="pseudoBreadCrumb">
										<h5 class="light italic" style="color:#{{ $co->color_detalle }}">{{ $secciones[5]->nombre }} / <span class="letterYellow">{{ $co->titulo }}</span></h5>
									</div>
								@endif
								<!--Seccion de Migaja o Imagen de APP -->
								<div class="tittlePrincipal">
									<h2 style="color:#{{ $co->color_titulo }}">
										{{ $co->subtitulo }}
									</h2>
								</div>
								<!--Seccion de Migaja o Imagen de APP -->
								<!--Seccion TEXTO DE CONTENIDO-->
								@if($co->texto_contenido)
								<div class="TextOfContent" style="color:#{{ $co->color_detalle }}">
										{!!$co->texto_contenido!!}
								</div>
								@endif
								<!--Seccion TEXTO DE CONTENIDO-->
								<!--Seccion de LINKS Superiores-->
								@if($co->posicion_links == 'A')
									<div class="link" style="color:#{{ $co->color_link }}">
									@foreach ($co->links as $lnk)
										<span class="parentLink"><span class="lineLink"></span><a href="{{$lnk->url}}" class="letterBlack letter" style="color:#{{ $co->color_link or '000' }}">{{$lnk->nombre}}</a></span>
									@endforeach
								</div>
								@endif
								<!--Seccion de LINKS Superiores-->

							</div>

							@if($co->link_android && $co->link_ios)
								<!--Sección de LINKS APPS-->
								<div class="imageLink">
									<a href="{{$co->link_ios}}"><img src="web/img/tlslabassetes/AppStore.png" alt=""></a>
									<a href="{{$co->link_android}}"><img src="web/img/tlslabassetes/Googleplay.png" alt=""></a>
								</div>
								<!--Sección de LINKS APPS-->
							@else
								<!--Seccion de TABS-->
								@if(count($co->detalles) > 0)
									<div class="tabsContainer">
										<div class="tabsTittle" style="color:#{{ $co->color_detalle }}">
											@foreach ($co->detalles as $det)
												<p class="{{ $loop->first ? 'tabActive' : '' }} tabContenedor" style="color:#{{ $co->color_detalle }}" data-clase="{{ $co->slug }}" data-id='{{$det->id}}'">{{$det->titulo}}</p>
											@endforeach
										</div>
										<div class="tabsContent {{ $co->slug }}" style="height: 0px;">
											@foreach ($co->detalles as $det)
												<div class="{{ $loop->first ? 'contentActive' : '' }} contenido  trasladoTabText" style="color:#{{ $co->color_detalle }}" data-contenido='{{$det->id}}'">
													{!! $det->detalle !!}
												</div>
											@endforeach
										</div>
									</div>
								@endif
								<!--Seccion de TABS-->
							@endif
							<!--Seccion de LINKS inferiores-->
							@if($co->posicion_links == 'D')
								<div class="link" style="position: relative;top: -4.5rem;color:#{{ $co->color_link }}">
								@foreach ($co->links as $lnk)
									<span class="parentLink"><span class="lineLink"></span><a href="{{$lnk->url}}" class="letterBlack letter" style="color:#{{ $co->color_link or '000' }}">{{$lnk->nombre}}</a></span>
								@endforeach
							</div>
							@endif
							<!--Seccion de LINKS inferiores-->
							<!--Seccion de Pie de Contenido-->
							<div class="link" style="position: relative;top: -4rem;color:#{{ $co->color_detalle }}">
								{!! $co->pie_contenido !!}
							</div>
							<!--Seccion de Pie de Contenido-->
						</div>
					</div>
					<div class="imgMainContainer">
						@if(count($co->imagenes) > 0 && count($co->video) == 0)
							<div class="sliderLabContainer">
								<div class="slideTlsLab">
									@foreach ($co->imagenes as $ima)
									<div class="slideTlsLabItem">
										<img src="{{$ima->imagen}}" alt="">
									</div>
									@endforeach
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="fakeFooter"></div>
			</div>
		</div>
		@endforeach
	@else
	<div class="section fp-noscroll">
		<div class="portadaSection" style="display: flex;align-items: center;justify-content: center;width: 100%;height: 100%;">
			<div>
				<span>La sección de Por qué TLS no tiene contenido definido</span>
			</div>
		</div>
	</div>  
	@endif
</div>