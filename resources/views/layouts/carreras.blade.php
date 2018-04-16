<?php use App\Http\Controllers\HomeController; ?>
<div id="" class="section">
	<div class="slide">
		<div class="sectionContainer bgNegro">
			<div class="fakeHeader carrProfHeader"></div>
			<div class="content fiftyFifty carrProfContent">
				<div class="middleText letterWhite">
					<p class="bold"><span class="parent"><span class="line lineBlackGray"></span><span class="letter">Carreras</span></span><span class="parent"><span class="line lineBlackGray"></span><span class="letter">Profesionales</span></span></p>
				</div>
				<div class="carrProfMainContainer">
					<div class="carrProfContainer">
						<div class="carrerrasSlider">
							<div class="carrSliderItem">
								@if(count($carreras) > 0)
									@foreach($carreras as $car)
									<div class="carrera">
										<a href="">{{$car->nombre}}</a>
									</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="fakeFooter"></div>
		</div>
	</div>
	
	@if(count($carreras) > 0)
		@foreach($carreras as $car)
		<div class="slide carrSlide">
			<div class="sectionContainer bgTest" style="color:#{{$car->color or ''}}">
				<div class="fakeHeader"></div>
				<div class="content fiftyFifty">
					<div class="middleText letterWhite">
						@if($car->video)
							<?php 
							$youtubeVideo = HomeController::getIdYoutube($car->video);
							?>
							<!-- <div style="width: 800px;height: 300px"> -->
							<div class="youtubeWrapper">
							{!! $youtubeVideo['iframe'] !!}
							</div>
						@else
							<img class="carrImg" src='{{ URL::to("/") }}/img/carreras/{{$car->img}}' alt="">
						@endif
						<h3 style="color:#{{$car->color_titulo_slide or ''}}">{{$car->nombre}}</h3>
						<a href="carrera/{{ $car->id }}" class="letterBlack" style="color:#{{$car->color_link_slide or ''}}">Ver más</a>
					</div>
				</div>
				<div class="fakeFooter"></div>
			</div>
		</div>
		@endforeach
	@endif
</div>