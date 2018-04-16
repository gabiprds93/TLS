<!DOCTYPE html>
<html lang="es-ES">
<head>
    @include('layouts.head')
</head>
<body style="position: relative;">
    @include('layouts.terminos-condiciones')

    <div class="mainContainer noFix">
        @include('layouts.header')
        @include('layouts.menu-responsive')
		<div class="primeraSeccionContainer">
			<!--*********BREADCRUMS REUTILIZABLE***********-->
			<div class="breadCrumbs">
				<a href="{{URL::to('/')}}/blog">Noticias y Blog</a>
				<a>{{$articulos[0]->titulo}}</a>
			</div>
			<!--*******************************************-->
			<div class="imgBlogContainer">
				<img src="{{URL::to('/')}}/img/blog/{{$articulos[0]->imagen}}" alt="">
				<div class="blogCite">
					<div class="blogDate">
						<p class="bold"><span class="letterPink">Publicado:</span> {{ date("d/m/Y", strtotime($articulos[0]->created_at))}}</p>
					</div>
					<div class="blogDescription">
						@if($articulos[0]->autor)
						<p class="bold"><span class="letterPink">Por:</span> {{$articulos[0]->autor}}</p>
						@endif
						@if($articulos[0]->cargo)
						<p class="letterLightGray" style="margin-bottom: 1rem;">{{$articulos[0]->cargo}}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="blogText">
				<h2 class="pruebaSplit"><span class="parent"><span class="line lineGray"></span><span class="letter letterPink">{{$articulos[0]->titulo}}</span></span></h2>
				<h3>{{$articulos[0]->introduccion}}</h3>
				<div class="blogUl">
					{!!$articulos[0]->contenido!!}
				</div>
			</div>
			<div class="notBlogLine"></div>
			<div class="notBlogredes">
				<p class="bold">Compartir:</p>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-facebook"></i></a>
			</div>
			<div class="noticias">
				@foreach ($articulos as $art)
				    @if ($loop->first) @continue @endif
				    
				    <a class="noticia cursor" href="{{URL::to('/')}}/blog/{{$art->id}}/{{$art->slug}}" style="background: url('{{URL::to('/')}}/img/blog/{{$art->imagen}}');">
						<div class="noticiaText">
							<p class="letterPink bold notBlogTittle">{{ $art->titulo }}</p>
							<p class="notBlogText">{{ $art->introduccion }}</p>
							<p class="notBlogLink bold">Ver más</p>
						</div>
					</a>
				@endforeach
				
			</div>
			@include('layouts.footer')
    </div> 

    @include('layouts.scripts')
</body>
</html>