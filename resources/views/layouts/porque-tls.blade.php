<?php use App\Http\Controllers\HomeController; ?>
<div id="section1" class="section">
	@if(count($secciones[1]->contenidos) > 0)
		@foreach($secciones[1]->contenidos as $co)

		<div class="slide slideScroll fp-noscroll" data-slidename="{{ $co->slug }}">
			<?php 
			if ($co->imagen_fondo) {
				$fondo = "background: url('/img/contenidos/$co->imagen_fondo')";
				$clase = "tlsLabBG";
			}else{
				$fondo = "background: #$co->color_contenido";
				$clase = "";
			}

			if ($co->imagen_app) {
				$clase_img_app = "tittleLab";
			}else{
				$clase_img_app = "";
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
										<h5 class="light italic" style="color:#{{ $co->color_detalle }}">{{ $secciones[1]->nombre }} / <span class="letterYellow">{{ $co->titulo }}</span></h5>
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
								<div class="link">
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
								<div class="link" style="position: relative;top: -4.5rem;">
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
		@endforeach
		<!--HISTORIA-->
		<div class="slide slideScroll fp-noscroll">
			<div class="sectionContainer bgVerde">
				<div class="fakeHeader"></div>

				<div class="content fiftyFifty">
					<div class="porQTlsSlide">
						@foreach($historia as $his)
						<div class="pqTlsSlideContent">
							<div class="pqTlsContent">
								<div class="contentPqt">
									<p class="bold orden" style="color: #FF9700;">0{{$loop->iteration}}.</p>
									<h2>{{$his->titulo}}</h2>
									<p class="contentText">{{$his->introduccion}}</p>
									<div class="lineaPqTls" style="background: #FF9700;"></div>
									<div class="linktoShow" id="{{$his->id}}" 
										data-id="{{$his->id}}"
										data-loopiteracion="0{{$loop->iteration}}."
										data-titulo="{{$his->titulo}}" 
										data-introduccion="{{$his->introduccion}}"
										data-imagen="{{ URL::to('/') }}/img/historias/{{$his->imagen}}">
										<a class="contentButton bold">Ingresa aquí</a>

										<div class="linkContainerOrigin">
											<!-- @foreach($his->internas as $int)
											<span class="parentLink">
												<span class="lineLink lineNaranja"></span>
												<a class="letter letterBlack" data-id-item="{{$int->id}}" 
													data-imagen-item="{{ URL::to('/') }}/img/historias/{{$int->imagen}}" 
													data-titulo-item="{{$int->titulo}}" data-contenido-item="{{$int->contenido}}" 
													href="">{{$int->titulo}}</a>
											</span>
											@endforeach -->
										</div>
										<div class="imageContainerOrigin">
											<img src="{{ URL::to('/') }}/img/historias/{{$his->imagen}}" alt="">
										</div>
									</div>
								</div>
								<div class="pqTlsContentImg">
									<img src="{{ URL::to('/') }}/img/historias/{{$his->imagen}}" alt="">
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="fakeFooter"></div>
			</div>

			<!-- <div class="single-item"> -->

			<div id="pqTlsModal" class="popUpContainer">
				<div class="single-item" id="sliderHistorias">
					
					<div class="sliderPopUp" id="modal0">
						<div class="sliderPopUpContent">
							<div class="sectionContainer">
								<div class="content fiftyFifty" style="background: white;">
									<div class="textMainContainer">
										<div class="textContainer portada">
											<div class="tittle">
												<div class="closePopUpButton">
													<img src="web/img/Icons/MenuClose.svg" alt="">
												</div>
												<div class="tittlePrincipal">
													<span style="color: #FF9700"></span>
													<h2></h2>
												</div>
												<div class="subTittle letterWhite">
													<p class="" style="color: #8590A1"></p>
												</div>
												<div class="link">
													<span class="parentLink" id="link1">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1999</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1997</a>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="imgMainContainer">
										<img src="" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="sliderPopUp" id="modal1">
						<div class="sliderPopUpContent">
							<div class="sectionContainer">
								<div class="content fiftyFifty" style="background: white;">
									<div class="textMainContainer">
										<div class="textContainer portada">
											<div class="tittle">
												<div class="closePopUp">
													<img src="web/img/Icons/ArrowBlack.svg" alt="">
												</div>
												<div class="tittlePrincipal">
													<span style="color: #FF9700">Año</span>
													<h2>Titulo</h2>
												</div>
												<div class="subTittle letterWhite">
													<p class="" style="color: #8590A1">gfdgdf gdfgfdgd</p>
												</div>
												<div class="link">
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="imgMainContainer">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sliderPopUp" id="modal2">
						<div class="sliderPopUpContent">
							<div class="sectionContainer">
								<div class="content fiftyFifty" style="background: white;">
									<div class="textMainContainer">
										<div class="textContainer portada">
											<div class="tittle">
												<div class="closePopUpButton">
													<img src="web/img/Icons/MenuClose.svg" alt="">
												</div>
												<div class="tittlePrincipal">
													<span style="color: #FF9700"></span>
													<h2>adsfds</h2>
												</div>
												<div class="subTittle letterWhite">
													<p class="" style="color: #8590A1"></p>
												</div>
												<div class="link"></div>
											</div>
										</div>
									</div>
									<div class="imgMainContainer">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			
				<div id="pqTlsModalIntern" class="popUpContainer">
					<div class="sliderPopUp">
						<div class="sliderPopUpContent">
							<div class="sectionContainer">
								<div class="content fiftyFifty" style="background: white;">
									<div class="textMainContainer">
										<div class="textContainer portada">
											<div class="tittle">
												<div class="closePopUp">
													<img src="web/img/Icons/ArrowBlack.svg" alt="">
												</div>
												<div class="tittlePrincipal">
													<span style="color: #FF9700">Año</span>
													<h2>Titulo</h2>
												</div>
												<div class="subTittle letterWhite">
													<p class="" style="color: #8590A1">gfdgdf gdfgfdgd</p>
												</div>
												<div class="link">
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
													<span class="parentLink">
														<span class="lineLink lineNaranja"></span>
														<a class="letter letterBlack">1998</a>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="imgMainContainer">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="pqTlsModalItem" class="popUpContainer">
					<div class="sliderPopUp">
						<div class="sliderPopUpContent">
							<div class="sectionContainer">
								<div class="content fiftyFifty" style="background: white;">
									<div class="textMainContainer">
										<div class="textContainer portada">
											<div class="tittle">
												<div class="closePopUpButton">
													<img src="web/img/Icons/MenuClose.svg" alt="">
												</div>
												<div class="tittlePrincipal">
													<span style="color: #FF9700"></span>
													<h2>adsfds</h2>
												</div>
												<div class="subTittle letterWhite">
													<p class="" style="color: #8590A1"></p>
												</div>
												<div class="link"></div>
											</div>
										</div>
									</div>
									<div class="imgMainContainer">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- </div> -->

		</div>
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