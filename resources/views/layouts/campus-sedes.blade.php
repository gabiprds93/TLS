<div id="section1" class="section">
	<div class="slide">
		<div class="sectionContainer bgCeleste">
			<div class="fakeHeader campusFakeHeader"></div>
			<div class="content fiftyFifty" style="align-items: flex-start;">
				<div class="campusContainer">
					<div class="pseudoBreadCrumb" style="position: absolute;top: 0;left: 2%;">
						<h5 class="letterWhite light italic">Campus y Sedes</h5>	
					</div>
					<div class="mapaMainContainer">
						<div class="mapaContainer">
							<div id="map"></div>
						</div>
					</div>
					<div class="campusImgMainContainer">
						<div class="campusImgContainer">
							<img class="imgCampus" src="web/img/campusSedes/chacarilla3.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="sedesContainer">
					<div class="sedeBox">
						<div class="boxs">
							@if(count($sedes) > 0)
								@foreach ($sedes as $sed)
								<a class="box letterWhite cursor chacarilla">
									<div class="sedeBoxTittle">
										<span class="parent"><span class="line lineLightYellow" style="opacity: 1;"></span><span class="letter">{{$sed->nombre}}</span></span>
									</div>
									<div class="sedeBoxDirection">
										<p>{{$sed->direccion}}</p>
									</div>
								</a>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="fakeFooter"></div>
		</div>
	</div>
</div>