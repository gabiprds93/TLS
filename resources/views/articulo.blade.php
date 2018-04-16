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
				<a>{{$articulo[0]->titulo}}</a>
			</div>
			<!--*******************************************-->
			<div class="imgBlogContainer">
				<img src="{{URL::to('/')}}/img/blog/{{$articulo[0]->imagen}}" alt="">
				<div class="blogCite">
					<div class="blogDate">
						<p class="bold"><span class="letterPink">Publicado:</span> {{ date("d/m/Y", strtotime($articulo[0]->created_at))}}</p>
					</div>
					<div class="blogDescription">
						@if($articulo[0]->autor)
						<p class="bold"><span class="letterPink">Por:</span> {{$articulo[0]->autor}}</p>
						@endif
						@if($articulo[0]->cargo)
						<p class="letterLightGray" style="margin-bottom: 1rem;">{{$articulo[0]->cargo}}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="blogText">
				<h2 class="pruebaSplit"><span class="parent"><span class="line lineGray"></span><span class="letter letterPink">{{$articulo[0]->titulo}}</span></span></h2>
				<h3>{{$articulo[0]->introduccion}}</h3>
				<div class="blogUl">
					{!!$articulo[0]->contenido!!}
				</div>
			</div>
			<div class="notBlogLine"></div>
			<div class="notBlogredes">
				<p class="bold">Compartir:</p>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-facebook"></i></a>
			</div>
			<div class="noticias">
				@foreach ($lista_articulos as $art)
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