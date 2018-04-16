<div id="section1" class="section">
	<div class="slide slideScroll">
		<div class="sectionContainer bgPink">
			<div class="fakeHeader fakeWhyTls"></div>
			<div class="content fiftyFifty"><!--porcentajes de los lados con respecto al requerimiento-->
				<div class="eventosMainContainer">
					<div class="eventosContainer">
						<div class="tittleEventos">
							<div class="tittlePrincipal">
								<h2>Eventos</h2>
							</div>
						</div>
						<div class="selectores">
							<select name="" id="">
								<option value="">Productos</option>
								<option value="">Productos</option>
								<option value="">Productos</option>
							</select>
							<select name="" id="">
								<option value="">Meses</option>
								<option value="">Meses</option>
								<option value="">Meses</option>
							</select>
						</div>
						@if(count($eventos) > 0)
						<div class="eventos">
							<div class="leftSide">
								<!--Cards de la Izquierda-->
								@for($i = 0; $i < count($eventos); $i=$i+2)
									<a href="evento/{{ $eventos[$i]->id }}" class="card cursor">
										<div class="cardFlecha">
											<!--<div class="cardBullet"></div>-->
										</div>
										<div class="imgCard">
											<img src="{{$eventos[$i]->eventos_imagenes[0]->imagen or ''}}" alt="">
											<div class="textImg">
												<p class="letterWhite bold">{{$eventos[$i]->nombre}}</p>
											</div>
										</div>
										<div class="textCard">
											<p class="letterWhite">{!!$eventos[$i]->desc_home!!}</p>
											<span class="letterBlack bold">Asistir</span>
										</div>
									</a>
								@endfor
								<!--Cards de la Izquierda-->
							</div>
							<div class="middleSide"></div>
							<div class="rightSide">
								<!--Cards de la Derecha-->
								@for($i = 1; $i < count($eventos); $i=$i+2)
									<a href="evento/{{ $eventos[$i]->id }}" class="card cursor">
										<div class="cardFlecha">
											<!--<div class="cardBullet"></div>-->
										</div>
										<div class="imgCard">
											<img src="{{$eventos[$i]->eventos_imagenes[0]->imagen or ''}}" alt="">
											<div class="textImg">
												<p class="letterWhite bold">{{$eventos[$i]->nombre}}</p>
											</div>
										</div>
										<div class="textCard">
											<p class="letterWhite">{!!$eventos[$i]->desc_home!!}</p>
											<span class="letterBlack bold">Asistir</span>
										</div>
									</a>
								@endfor
								<!--Cards de la Derecha-->
							</div>
						</div>
						<a href="">Ver más eventos</a>
						@else
							<span>No hay eventos registrados</span>
						@endif
						<br><br>
					</div>
				</div>
			</div>
			<div class="fakeFooter fakeWhyTls"></div>
		</div>
	</div>
</div>