<?php use App\Http\Controllers\HomeController; ?>
<div id="section1" class="section">
	@if(count($secciones[3]->contenidos) > 0)
        @foreach($secciones[3]->contenidos as $co)
        	@if($co->slide_lab != 'S')
        	<!--SECCION COMUN -->
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
										<h5 class="light italic" style="color:#{{ $co->color_detalle }}">{{ $secciones[3]->nombre }} / <span class="letterYellow">{{ $co->titulo }}</span></h5>
									</div>
									@endif
									<!--Seccion de Migaja o Imagen de APP -->
									<div class="tittlePrincipal">
										<h2 style="color:#{{ $co->color_titulo }}">
											{{ $co->subtitulo }}
										</h2>
									</div>
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
			<!-- SECCION COMUN-->
			@else
			<!--SLIDE LAB-->
	        <div class="slide">
				<div class="modalVideoContainer">
					<div class="modalVideo">
						<div class="closeModalButton">
							<i class="far fa-times-circle"></i>
						</div>
						@if(count($co->video) > 0)
						<?php 
							$youtubeVideo = HomeController::getVideoIdYoutube($co->video);
						?>
						<!-- <div class="youtubeTLSWrapper"> -->
							<iframe id="videoTLSLAB" src="http://www.youtube.com/embed/{!! $youtubeVideo !!}?iv_load_policy=3&controls=0&loop=1&controls=0&showinfo=0&branding=0&autohide=0&disablekb=1&enablejsapi=1&fs=0&rel=0&modestbranding=1" frameborder="0" allow="autoplay; encrypted-media"></iframe>
						<!-- </div> -->
						@endif
					</div>
				</div>
				<div class="sectionContainer tlsLabBG arcadeTls" style="background: url('{{ URL::to('/') }}/img/contenidos/{{$co->imagen_fondo or '' }}');">
					<div class="fakeHeader fakeHeaderMobile"></div>
					<div class="content fiftyFifty"><!--porcentajes de los lados con respecto al requerimiento-->
						<div class="textMainContainer">
							<div class="textContainer portada letterWhite">
								<div class="tittle tittleLab">
									@if($co->imagen_app)
									<img src="{{ URL::to('/') }}/img/contenidos/{{$co->imagen_app}}" alt="">
									@endif
									<div class="tittlePrincipal" style="margin: 1rem 0 2rem 0;">
										<h2>{{ $co->subtitulo or '' }}</h2>
									</div>
									<div class="linkVideo linkVideoMobile">
										<div class="ytbVideoContainer">
											<div class="playVideo">
												<img class="cursor" src="{{asset('web/img/tlslabassetes/Player-white.svg')}}" alt="">
											</div>
										</div>
									</div>
									<div class="link principalLink principalLinkTlsLab" style="color:#{{ $co->color_link }}">
										@foreach ($co->links as $lnk)
										    <span class="parentLink"><span class="lineLink"></span><a href="{{$lnk->url}}" target="_blank" class="letterBlack letter" style="color:#{{ $co->color_link or '000' }}">{{$lnk->nombre}}</a></span>
										@endforeach
									</div>
									@if($co->link_android && $co->link_ios)
										<!--Sección de LINKS APPS-->
										<div class="imageLink">
											<a href="{{$co->link_ios}}"><img src="{{asset('web/img/tlslabassetes/AppStore.png')}}" alt=""></a>
											<a href="{{$co->link_android}}"><img src="{{asset('web/img/tlslabassetes/Googleplay.png')}}" alt=""></a>
										</div>
										<!--Sección de LINKS APPS-->
									@endif
								</div>
							</div>
						</div>
						<div class="imgMainContainer">
							<div class="linkVideo">
								<div class="ytbVideoContainer">
									<div class="playVideo">
										<img class="cursor" src="{{asset('web/img/tlslabassetes/Player-white.svg')}}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="fakeFooter"></div>
				</div>
			</div>
			<!--SLIDE LAB-->
			@endif
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