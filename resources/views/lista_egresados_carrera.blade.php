<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer aeSMainContainer noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<div class="breadCrumbs">
			<a href="#">Carreras Profesionales</a>
			<a href="{{ URL::to('/') }}/carrera/{{$carrera->id}}">{{$carrera->nombre}}</a>
			<a >Alumnos Egresados</a>
		</div>
		<!--ae = Alumnos Egresados-->
		<div class="alumnosEgresadosContainer">
			<div class="aeUp">
				<a>Alumnos Egresados<div class="subLine"></div></a>
				<h4>{{$carrera->nombre}}</h4>
				<select name="" id="listaCarreras">
					<option value="" disabled selected>Filtrar por carreras</option>
					@foreach($lista_carreras as $listCa)
					<option value="">{{$listCa->nombre}}</option>
					@endforeach
				</select>
			</div>
			
		</div>
		<div class="owl-carousel owl-theme">
			<!--SLIDER NUMERO 1 DE ALUMNOS-->
			<div class="item aeItem">
				@foreach($lista_egresados as $egr)
				<a href="{{ URL::to('/') }}/egresado/{{ $egr->id }}" class="imgCont">
					<div class="imagenFake">
						@if(count($egr->imagenes) > 0)
							<img src="{{ URL::to('/') }}/img/egresados/{{$egr->imagenes[0]->imagen}}" alt="">
							@if($egr->imagenes[1]->imagen)
							<img src="{{ URL::to('/') }}/img/egresados/{{$egr->imagenes[1]->imagen}}" alt="">
							@endif
						@endif
					</div>
					<p class="nameImg1">{{$egr->nombre}}</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
				@endforeach
			</div>
			<!---->
			<div class="item aeItem">
				<a href="#>" class="imgCont">
					<div class="imagenFake">
						<img src="assets/img/estudiante.jpg" alt="">
						<img src="assets/img/estudiante2.jpg" alt="">
					</div>
					<p class="nameImg1">Jimena Rodríguez</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
				<a href="#" class="imgCont">
					<div class="imagenFake">
						<img src="assets/img/estudianteHombre.jpg" alt="">
						<img src="assets/img/estudianteHombre2.jpg" alt="">
					</div>
					<p class="nameImg1">Diego Valverde</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
				<a href="#" class="imgCont">
					<div class="imagenFake">
						<img src="assets/img/estudiante.jpg" alt="">
						<img src="assets/img/estudiante2.jpg" alt="">
					</div>
					<p class="nameImg1">Ximena Saldarriaga</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
				<a href="#" class="imgCont">
					<div class="imagenFake">
						<img src="assets/img/estudianteHombre.jpg" alt="">
						<img src="assets/img/estudianteHombre2.jpg" alt="">
					</div>
					<p class="nameImg1">Arturo De La Torre</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
				<a href="#" class="imgCont">
					<div class="imagenFake">
						<img src="assets/img/estudianteHombre.jpg" alt="">
						<img src="assets/img/estudianteHombre2.jpg" alt="">
					</div>
					<p class="nameImg1">Rodrigo Reyes</p>
					<p class="nameImg2">Conóceme →</p>
				</a>
			</div>

		</div>
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')

    <script type="text/javascript">
    	$('document').ready(function(){

    	});
    </script>
</body>
</html>