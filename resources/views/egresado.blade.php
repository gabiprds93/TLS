<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer aeMain noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<div class="breadCrumbs">
			<a href="#">Carreras Profesionales</a>
			<a href="#">{{$egresado[0]->carrera->nombre}}</a>
			<a href="#">Alumnos Egresados</a>
			<a >{{$egresado[0]->nombre}}</a>
		</div>
		<!--ae = Alumnos Egresados-->
		<div class="alumnosEgresadosContainer">
			<div class="aeUp">
				<a>Alumnos Egresados<div class="subLine"></div></a>
				<h4>{{$egresado[0]->carrera->nombre}}</h4>
				<!--<select name="" id="">
					<option value="" disabled selected>Filtrar por mundos</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
					<option value="">Lorem Ipsum</option>
				</select>-->
			</div>
		</div>
		<div class="aeDescripcion">
			<div class="aeDesLeft">
				<div class="alumnoImgSlider">
					<!--Imagen Slider-->
					@foreach($egresado[0]->imagenes as $img)
					<div>
						<div class="fake">
							<img src="{{ URL::to('/') }}/img/egresados/{{$img->imagen}}" alt="">
						</div>
					</div>
					@endforeach
					<!--Imagen Slider-->
				</div>
			</div>
			<div class="aeDesRight">
				<h3>{{$egresado[0]->nombre}}</h3>
				<div class="aeDesText">
					{!!$egresado[0]->descripcion!!}
					<p>"{{$egresado[0]->quote}}"</p>
					{!!$egresado[0]->pie_contenido!!}					
				</div>
				<div class="aeRedes">
					@if($egresado[0]->twitter)
					<a href="{{$egresado[0]->twitter}}"><img src="{{ asset('web/img/alumnoEgresado/twitterBlack.svg') }}" alt=""></i></a>
					@endif
					@if($egresado[0]->linkedin)
					<a href="{{$egresado[0]->linkedin}}"><img src="{{ asset('web/img/alumnoEgresado/linkedinBlack.svg') }}" alt=""></a>
					@endif
				</div>
				<div class="aeButton">
					<a href="javascript:window.history.back();"><img src="{{ asset('web/img/alumnoEgresado/ArrowBlack.svg') }}" alt=""></a>
				</div>
			</div>
		</div>
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>