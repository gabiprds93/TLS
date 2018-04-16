<?php use App\Http\Controllers\HomeController; ?>
<div id="" class="section">
	<div class="slide">
		<div class="sectionContainer">
			<div class="fakeHeader"></div>
			@if(count($secciones[1]->contenidos[0]->video) > 0)
			<?php 
				$youtubeVideo = HomeController::getVideoIdYoutube($secciones[1]->contenidos[0]->video);
			?>
			<div class="videoContainer" data-videoid="{!! $youtubeVideo !!}"></div>
			@endif
			<div class="content fiftyFifty">
				<div class="textMainContainer">
					<div class="formMainContainer letterWhite">
						<div class="pseudoBreadCrumb">
							<h5 class="light italic">Contacto</h5>	
						</div>
						<form action="" class="formContainer">
							<div class="contacInputs">
								<div class="contacInput">
									<label for="nombres">Nombres</label>
									<input type="text" name="nombres" id="nombres" required="required">
								</div>
								<div class="contacInput">
									<label for="apPaterno">Apellido Paterno</label>
									<input type="text" name="apPaterno" id="apPaterno" required="required">
								</div>
								<div class="contacInput">
									<label for="apMaterno">Apellido Materno</label>
									<input type="text" name="apMaterno" id="apMaterno" required="required">
								</div>
								<div class="contacInput">
									<label for="celular">Teléfono Celular</label>
									<input type="tel" name="celular" id="celular" required="required">
								</div>
								<div class="contacInput">
									<label for="email">E-mail</label>
									<input type="email" name="email" id="email" required="required">
								</div>
							</div>
							<div class="radios">
								<label for="">Interesado en:</label>
								<div class="radioContainer">
									<div class="radio">
										<input type="radio" name="interes" id="carrerasProf">
										<label for="carrerasProf">Carreras Profesionales</label>
									</div>
									<div class="radio">
										<input type="radio" name="interes" id="eduContinua">
										<label for="eduContinua">Educación Continua</label>
									</div>
									<div id="sedesdeinteres" class="fancycollapse">
										<select>
											<option value="">Sede de Interés</option>
											<option value="">Chacarilla</option>
											<option value="">Javier Prado</option>
											<option value="">Lima Norte</option>
											<option value="">Lima Sur</option>
											<option value="">San Miguel</option>
										</select>
									</div>
								</div>
								<button type="submit">Enviar</button>
								<div class="check">
									<input type="checkbox" id="terminosycondiciones">
									<label for="terminosycondiciones">Acepto los <a class="cursor" style="text-decoration: underline;">Términos y Condiciones</a></label>
								</div>
							</div>
							<br>
							<br>
							<br>
							<br>
							<br>
						</form>
					</div>
				</div>
				<!-- <div class="imgMainContainer" style="align-self: flex-start;"> -->
				<div class="imgMainContainer">
					<!-- <video data-autoplay loop src="web/img/videoTLS.mp4" type="video/mp4"></video> -->
					@if(count($secciones[1]->contenidos[0]->imagenes) > 0 && count($secciones[1]->contenidos[0]->video) < 0)
					<div class="sliderLabContainer">
						<div class="slideTlsLab">
							@foreach ($secciones[1]->contenidos[0]->imagenes as $ima)
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
</div>