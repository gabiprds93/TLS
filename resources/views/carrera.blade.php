<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
    <style>
    	.descripcionItem li::before{
    		color: #{{$carrera[0]->color_fuente}};
    	}
    </style>
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<div class="primeraSeccionContainer">
			<!--*********BREADCRUMS REUTILIZABLE***********-->
			<div class="breadCrumbs">
				<a href="{{ URL::to('/') }}/#carreras-profesionales">Carreras Profesionales</a>
				<a style="color:#{{$carrera[0]->color_fuente}}">{{$carrera[0]->nombre}}</a>
			</div>
			<!--*******************************************-->

			<!--<div class="titleMobile">
				<div class="up">
					<a>Animación Digital<div class="subLine"></div></a>
				</div>
			</div>-->
			<!--AD = Animación Digital-->
			<div class="adSlider">
				<div class="sliderContainer">
					<div class="adSliderSlick">
						<!--Slider-->
						@if(count($carrera[0]->sliders) > 0)
							@foreach($carrera[0]->sliders as $sld)
							<div class="adSlideItem" style="background: url('{{ URL::to('/') }}/img/carreras/{{$sld->imagen}}">
								<div class="slideContent">
									<div class="slideTittle">
										<h2><span class="parent"><span class="line lineGray"></span><span class="letter letterPink" style="color:#{{$carrera[0]->color_fuente}}">{{$sld->titulo}}</span></span></h2>
									</div>
									<div class="slideBox linePink letterWhite" style="background:#{{$carrera[0]->color_fuente}}">
										<p style="border-bottom: 5px solid white">{{$sld->subtitulo}}</p>
										{!!$sld->texto_corto!!}
									</div>
								</div>
							</div>
							@endforeach
						@endif
						<!--Slider-->
					</div>
				</div>
			</div>
			<div class="adText">
				{!! $carrera[0]->descripcion_carrera or '' !!}
			</div>
			<div class="descripciones">
				<div class="descripcion">
					<span style="background:#{{$carrera[0]->color_linea_contenido}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$carrera[0]->color_fuente}}">Certificaciones</h2>
						{!! $carrera[0]->certificaciones or '' !!}
					</div>
					<div class="descripcionItem">
						<h2 style="color:#{{$carrera[0]->color_fuente}}">¿Que ofrecemos?</h2>
						{!! $carrera[0]->ofrecemos or '' !!}
					</div>
				</div>
				<div class="descripcion">
					<span style="background:#{{$carrera[0]->color_linea_contenido}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$carrera[0]->color_fuente}}">Muestra tu talento</h2>
						{!! $carrera[0]->talento or '' !!}
					</div>
				</div>
				<div class="descripcion">
					<span style="background:#{{$carrera[0]->color_linea_contenido}}"></span>
					<div class="descripcionItem">
						<h2 style="color:#{{$carrera[0]->color_fuente}}">Por qué nosotros?</h2>
						{!! $carrera[0]->nosotros or '' !!}
					</div>
				</div>
			</div>
		</div>
		<div class="segundaSeccionContainer">
			<div class="mallaBtn">
				<p>Ver malla</p>
			</div>
			<div class="moduloUp">
				<h2>Cursos por Módulo</h2>
				<div class="moduloDuracion">
					<p><span style="color:#{{$carrera[0]->color_fuente}}">DURACIÓN TOTAL:</span> {{ $carrera[0]->tiempo_total or '' }}</p>
					<p><span style="color:#{{$carrera[0]->color_fuente}}">1 MÓDULO: </span>{{ $carrera[0]->variacion_tiempo or '' }}</p>
				</div>
				<div class="moduloImg" style="margin-bottom:4rem;">
					<svg width="562px" height="23px" viewBox="0 0 562 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<style>
							#Fill-1{
							fill:#{{$carrera[0]->color_fuente}};
							}
						</style>
						<g id="Carreras-profesionales---Animacion-digital---Interna-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(-439.000000, -1536.000000)">
							<g id="Malla" transform="translate(30.000000, 1370.000000)" fill="#FF1976">
							<path d="M962.080112,166 C957.41992,166 953.641899,169.778654 953.641899,174.438213 C953.641899,175.476061 953.83871,176.465181 954.181074,177.383424 L952.587597,178.976901 L946.892088,173.281392 L941.196579,178.976901 L935.50107,173.281392 L929.805561,178.976901 L924.110052,173.281392 L918.414544,178.976901 L912.719035,173.281392 L907.023526,178.976901 L901.328017,173.281392 L895.632508,178.976901 L889.936999,173.281392 L884.24149,178.976901 L878.545981,173.281392 L872.850472,178.976901 L867.154963,173.281392 L861.459454,178.976901 L855.763946,173.281392 L850.068437,178.976901 L844.372928,173.281392 L838.677419,178.976901 L832.98191,173.281392 L827.286401,178.976901 L821.590892,173.281392 L815.895383,178.976901 L810.199874,173.281392 L804.504365,178.976901 L798.808856,173.281392 L793.113348,178.976901 L787.417839,173.281392 L781.72233,178.976901 L776.026821,173.281392 L770.331312,178.976901 L764.635803,173.281392 L758.940294,178.976901 L753.244785,173.281392 L747.549276,178.976901 L741.853767,173.281392 L736.158258,178.976901 L730.46275,173.281392 L724.767241,178.976901 L719.071732,173.281392 L713.376223,178.976901 L707.680714,173.281392 L701.985205,178.976901 L696.289696,173.281392 L690.594187,178.976901 L684.898678,173.281392 L679.203169,178.976901 L673.507661,173.281392 L667.812152,178.976901 L662.116643,173.281392 L656.421134,178.976901 L650.725625,173.281392 L645.030116,178.976901 L639.334607,173.281392 L633.639098,178.976901 L627.943589,173.281392 L622.24808,178.976901 L616.552571,173.281392 L610.857063,178.976901 L605.161554,173.281392 L599.466045,178.976901 L593.770536,173.281392 L588.075027,178.976901 L582.379518,173.281392 L576.684009,178.976901 L570.9885,173.281392 L565.292991,178.976901 L559.597482,173.281392 L553.901973,178.976901 L548.206465,173.281392 L542.510956,178.976901 L536.815447,173.281392 L531.119938,178.976901 L525.424429,173.281392 L519.72892,178.976901 L514.033411,173.281392 L508.337902,178.976901 L502.642393,173.281392 L496.946884,178.976901 L491.251375,173.281392 L485.555867,178.976901 L479.860358,173.281392 L474.164849,178.976901 L468.46934,173.281392 L462.773831,178.976901 L457.078322,173.281392 L451.382813,178.976901 L445.687304,173.281392 L439.991795,178.976901 L434.296286,173.281392 L428.600777,178.976901 L422.905269,173.281392 L416.862966,179.324327 C416.045977,178.730728 415.044201,178.377607 413.957624,178.377607 C411.219983,178.377607 409,180.596956 409,183.335231 C409,186.072872 411.219983,188.292855 413.957624,188.292855 C416.695898,188.292855 418.915248,186.072872 418.915248,183.335231 C418.915248,182.606205 418.753875,181.917049 418.472264,181.29434 L422.905269,176.860703 L428.600777,182.556212 L434.296286,176.860703 L439.991795,182.556212 L445.687304,176.860703 L451.382813,182.556212 L457.078322,176.860703 L462.773831,182.556212 L468.46934,176.860703 L474.164849,182.556212 L479.860358,176.860703 L485.555867,182.556212 L491.251375,176.860703 L496.946884,182.556212 L502.642393,176.860703 L508.337902,182.556212 L514.033411,176.860703 L519.72892,182.556212 L525.424429,176.860703 L531.119938,182.556212 L536.815447,176.860703 L542.510956,182.556212 L548.206465,176.860703 L553.901973,182.556212 L559.597482,176.860703 L565.292991,182.556212 L570.9885,176.860703 L576.684009,182.556212 L582.379518,176.860703 L588.075027,182.556212 L593.770536,176.860703 L599.466045,182.556212 L605.161554,176.860703 L610.857063,182.556212 L616.552571,176.860703 L622.24808,182.556212 L627.943589,176.860703 L633.639098,182.556212 L639.334607,176.860703 L645.030116,182.556212 L650.725625,176.860703 L656.421134,182.556212 L662.116643,176.860703 L667.812152,182.556212 L673.507661,176.860703 L679.203169,182.556212 L684.898678,176.860703 L690.594187,182.556212 L696.289696,176.860703 L701.985205,182.556212 L707.680714,176.860703 L713.376223,182.556212 L719.071732,176.860703 L724.767241,182.556212 L730.46275,176.860703 L736.158258,182.556212 L741.853767,176.860703 L747.549276,182.556212 L753.244785,176.860703 L758.940294,182.556212 L764.635803,176.860703 L770.331312,182.556212 L776.026821,176.860703 L781.72233,182.556212 L787.417839,176.860703 L793.113348,182.556212 L798.808856,176.860703 L804.504365,182.556212 L810.199874,176.860703 L815.895383,182.556212 L821.590892,176.860703 L827.286401,182.556212 L832.98191,176.860703 L838.677419,182.556212 L844.372928,176.860703 L850.068437,182.556212 L855.763946,176.860703 L861.459454,182.556212 L867.154963,176.860703 L872.850472,182.556212 L878.545981,176.860703 L884.24149,182.556212 L889.936999,176.860703 L895.632508,182.556212 L901.328017,176.860703 L907.023526,182.556212 L912.719035,176.860703 L918.414544,182.556212 L924.110052,176.860703 L929.805561,182.556212 L935.50107,176.860703 L941.196579,182.556212 L946.892088,176.860703 L952.587597,182.556212 L955.47079,179.673018 C957.015539,181.622781 959.400058,182.876426 962.080112,182.876426 C966.739671,182.876426 970.517692,179.097772 970.517692,174.438213 C970.517692,169.778654 966.739671,166 962.080112,166" id="Fill-1"></path>
						</g>
					</g>
					</svg>
				</div>
			</div>
			<div class="modulos">
				<!--Módulos-->
				@if(count($carrera[0]->modulos) > 0)
					@foreach($carrera[0]->modulos as $mod)
					<div class="modulo">
						<div class="moduloTittle">
							<div class="moduloTittleUp">
								<p>MÓ <br> DU <br> LO</p>
								<span style="background:#{{$carrera[0]->color_fuente}}"></span>
								<p>{{$loop->iteration}}</p>
							</div>
							<span style="background:#{{$carrera[0]->color_fuente}}"></span>
							<div class="moduloTittleDown">
								<p style="color:#{{$carrera[0]->color_fuente}}">{{$mod->nombre}}</p>
							</div>
						</div>
						<div class="moduloDescripcion">
							<div class="descripcionItem">
								{!! $mod->contenido or '' !!}
							</div>
						</div>
					</div>
					@endforeach
				@endif
				<!--Módulos-->
			</div>
		</div>
		<div class="terceraSeccionContainer">
			<a href="{{ URL::to('/') }}/alumnos-egresados/{{$carrera[0]->id}}/{{$carrera[0]->slug}}">Conoce a nuestros egresados</a>
			<a href="{{ URL::to('/') }}/modalidades-titulacion">Modalidades de titulación</a>
		</div>
		<div class="cuartaSeccionContainer" style="background:#{{$carrera[0]->color_fuente}}">
			<h2>Contacto</h2>
			<form action="">
				<div class="inputs">
					<div class="inputsLeft">
						<div class="input">
							<label for="nombres">Nombres</label>
							<input type="text" name="nombres" id="nombres" required="required">
						</div>
						<div class="input">
							<label for="apMaterno">Apellido Materno</label>
							<input type="text" name="apMaterno" id="apMaterno" required="required">
						</div>
						<div class="input">
							<label for="celular">Celular</label>
							<input type="tel" name="celular" id="celular" required="required">
						</div>
					</div>
					<div class="inputsRight">
						<div class="input">
							<label for="apPaterno">Apellido Paterno</label>
							<input type="text" name="apPaterno" id="apPaterno" required="required">
						</div>
						<div class="input">
							<label for="email">E-mail</label>
							<input type="email" name="email" id="email" required="required">
						</div>
						<div class="input">
							<label for="telFijo">Teléfono Fijo</label>
							<input type="tel" name="telFijo" id="telFijo" required="required">
						</div>
					</div>
				</div>
				<div class="checkBoxCont">
					<input type="checkbox">
					<p>Acepto los <a class="cursor">Términos y Condiciones</a></p>
				</div>
				<div class="btnContac">
					<button>Comenzar ahora</button>
				</div>
			</form>
		</div>
		@if($sigCarrera && $antCarrera)
		<div class="quintaSeccionContainer">
			<div class="left" style="background: url('{{ URL::to('/') }}/img/carreras/{{$antCarrera->imagen_referencial or '' }}')">
				<a href="{{ $antCarrera->id }}">{{$antCarrera->nombre}}</a>
			</div>
			<div class="right">
				<a href="{{ $sigCarrera->id }}">{{$sigCarrera->nombre}}</a>
			</div>
		</div>
		@endif
		@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>