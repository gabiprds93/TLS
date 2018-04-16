$(function(){

	var URL= "";

	$('.tabContenedor').on('click', function(){
		var elem = $(this);
		var padre = elem.data('clase');
		id = elem.data('id');
		$(this).siblings('p').removeClass( "tabActive" );
		elem.addClass( "tabActive" );
		$('.'+padre).children('div').removeClass( "contentActive" );
		$('[data-contenido='+id+']').addClass( "contentActive" );

	});

	function getMaxHeight(el,parent){
		var parentHeight;
		parentHeight = parseInt(($(el).parent(parent).height()) - 1300);
		$(el).css({height: 'auto'});
		$(el).css({height: parentHeight});
	}

	var tl = new TimelineMax();

	$('#fullpage').fullpage({
		css3: true,
		anchors:['home','porqueTls','admision','tlsLab','carreras-profesionales','campus-sedes','empresas','incubadora','educacion-continua','eventos','contacto'],
		slidesNavigation: true,
		controlArrows: false,
		scrollOverflow: true,
		fixedElements: '#header, .footer',
		afterResize: function(){
			var pluginContainer = $(this);
			$.fn.fullpage.reBuild();
			if (pluginContainer.width() < 480) {
				$('.slideScroll').removeClass('fp-noscroll');
				$.fn.fullpage.reBuild();
			}else{
				$('.slideScroll').addClass('fp-noscroll');
				$.fn.fullpage.reBuild();
			}
			getMaxHeight('.tabsContent','.tabsContainer');
		},
		afterRender: function(){
			var pluginContainer = $(this);
			URL = pluginContainer.context.URL;

			var urlRoot = $("#logoTls").attr('href');
			// $.fn.fullpage.reBuild();

			if (pluginContainer.width() < 480) {
				$('.slideScroll').removeClass('fp-noscroll');
				$('.carrSlide').remove();
				$('.educDesktop').remove();
				// $.fn.fullpage.reBuild();
			}else{
				$('.slideScroll').addClass('fp-noscroll');
				$('.educMobile').remove();
				// $.fn.fullpage.reBuild();
			}

			$(pluginContainer).find(".fp-slidesNav").each(function(i, el) {
				var fpSlidesNav = $(this);
				$(fpSlidesNav).addClass('bulletContainer')
				$(fpSlidesNav).find('ul').addClass('bulletUl')
				$(fpSlidesNav).find('li').addClass('bulletLi')
				$(fpSlidesNav).find('a').addClass('bulletA')
				$(fpSlidesNav).find('span').addClass('bulletSpan')

				$('.bulletSpan').html('<div class="hoverMainContainer"><div class="hoverContainer"><div class="lineText"></div><p></p></div></div>')
			});

			getMaxHeight('.tabsContent','.tabsContainer');

			// YOUTUBE GENERAL INIT
			$(pluginContainer).find(".videoContainer").each(function(i, el) {
				var ytID = $(this).data('videoid');
				if (ytID != '') {
					$(el).YTPlayer({
						fitToBackground: true,
						videoId: ytID,
						pauseOnScroll: true,
						playerVars: {
							autoplay: 1,
							modestbranding: 1,
							controls: 0,
							disablekb: 1,
							origin: urlRoot,
							enablejsapi: 1,
							showinfo: 0,
							fs: 0,
							branding: 0,
							rel: 0,
							autohide: 0
						},
						events: {
							'onReady': onPlayerReady,
							'onStateChange': onPlayerReady
						}
					});
				}
			});

			function onPlayerReady(e) {
				e.target.playVideo();
				e.target.setVolume(0);
			}

			$('.TextOfContent').on('mouseenter', function() {
				$.fn.fullpage.setAllowScrolling(false);
			})

			$('.TextOfContent').on('mouseleave', function() {
				$.fn.fullpage.setAllowScrolling(true);
			})

			$('.adSliderSlick').slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 1,
				arrows: false
			});

			$('.owl-carousel').owlCarousel({
				items: 1,
				loop: true,
				margin: 10,
				nav: true,
				navText: ['Anterior', 'Siguiente'],
				dots: true
			});

			$('.alumnoImgSlider').slick({
				dots: true,
				arrows: false
			});

			$('.slideTlsLab').slick({
				dots: true,
				arrows: false,
				adaptiveHeight: true
			});

			$('.carrerrasSlider').slick({
				dots: true,
				arrows: false
			});

			$('.porQTlsSlide').slick({
				dots: false,
				arrows: false,
				slidesToShow: 3,
				slidesToScroll: 1
			});

			$(".single-item").slick({
				dots: false,
				draggable: false,
			});

			// $('.multiple-items').slick({
			// 	infinite: true,
			// 	slidesToShow: 1,
			// 	slidesToScroll: 3
			//   });

		},
		onLeave: function(index, nextIndex, direction){
			var leavingSection = $(this);

			if(index == 1 && direction =='down'){
				TweenMax.to($('.menuSearch'),.5,{opacity:0})
				TweenMax.to($('.menuSearch'),.5,{height:'1px'})
				TweenMax.to($('.menuLinks'),.5,{margin:0})
				TweenMax.to($('header'),.5,{height:'11%'})
				TweenMax.to($('.headerLogo'),.5,{width:'78%'})
			}

			if(index == 2 && direction == 'up'){
				TweenMax.to($('.menuSearch'),.5,{opacity:1,delay:0.3})
				TweenMax.to($('.menuSearch'),.5,{height:'auto'})
				TweenMax.to($('.menuLinks'),.5,{marginBottom:'2.5%'})
				TweenMax.to($('header'),.5,{height:'15%'})
				TweenMax.to($('.headerLogo'),.5,{width:'100%'})
			}

			if(index == 4 && direction == 'down'){
				$('.bulletUl').css({opacity: 0})
			}
			if(index == 5 && direction == 'up'){
				$('.bulletUl').css({opacity: 0})
			}
			if(index == 8 && direction == 'down'){
				$('.bulletUl').css({opacity: 0})
			}
			if(index == 10 && direction == 'up'){
				$('.bulletUl').css({opacity: 0})
			}
		},
		afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex){
			var loadedSlide = $(this);
			URL = window.location.href;

			var uri = ['#tlsLab/2','#tlsLab/3','#tlsLab/4','#tlsLab/5']
			checkUrl(uri)

			// if (anchorLink =='carreras-profesionales') {
			// 	console.log('Se cargó el video de: ' + slideAnchor)
			// }
		},
		afterLoad: function(anchorLink, index){
			var loadedSection = $(this);

			URL = loadedSection.context.URL;

			var uri = ['#tlsLab/2','#tlsLab/3','#tlsLab/4','#tlsLab/5']
			checkUrl(uri)

			var carreras = ['Inicio','Animación Digital','Arquitectura de Interiores','Comunicación Audiovisual Multimedia','Comunicación Audiovisual','Comunicación Integral','Dirección y Diseño Gráfico','Dirección y Diseño Publicitario','Diseño de Interiores','Diseño de Producto','Diseño de Videojuegos y Entretenimiento Digital','Diseño Gráfico','Diseño y Desarrollo para Medios Digitales','Diseño y Gestión de la Moda','Fotografía e Imagen Digital','Periodismo y Medios Digitales','Publicidad y Marketing Digital','Publicidad'];

			if(index == 5){
				if ($(this).width() < 480) {
					$('.bulletUl').css({opacity: 0})
				}else{
					$('.bulletUl').css({opacity: 1})
				}

				$('.bulletLi').addClass('dotsTransparent');

				var bullets = $(this).find('.hoverContainer');
				for (var i = 0; i < bullets.length; i++) {
					$(bullets[i]).append("<p>"+carreras[i]+"</p>");
				}
				$('.bulletA').on('mouseenter',function(){
					TweenMax.set($(this).find('.hoverMainContainer'),{display:'flex'})
					tl.to($(this).find('.hoverMainContainer'),.1,{opacity:1})
					.to($(this).find('.hoverContainer'),.2,{opacity:1})
					.to($(this).find('.hoverMainContainer'),.2,{border: '1px solid rgba(255,255,255,.3)'})
				});

				$('.bulletA').on('mouseleave',function(){
					TweenMax.to($(this).find('.hoverMainContainer'),.1,{opacity:0})
					TweenMax.to($(this).find('.hoverContainer'),.1,{opacity:0})
					TweenMax.to($(this).find('.hoverMainContainer'),.1,{display:'none'})
					TweenMax.to($(this).find('.hoverMainContainer'),.1,{border: '1px solid transparent'})
				});
			}else{
				$('.bulletLi').removeClass('dotsTransparent');
				$('.bulletA').on('mouseenter',function(){
					TweenMax.set($('.hoverMainContainer'),{opacity:0})
					TweenMax.set($('.hoverContainer'),{opacity:0})
					TweenMax.set($('.hoverMainContainer'),{display:'none'})
					TweenMax.set($('.hoverMainContainer'),{border: '1px solid transparent'})
				});
				$('.bulletUl').css({opacity: 1})
			}

			if(index == 9){
				if ($(this).width() < 480) {
					$('.bulletUl').css({opacity: 0})
				}else{
					$('.bulletUl').css({opacity: 0})
				}
			}
			if (anchorLink == 'contacto' ) {
				function eduChecked(){
					$('.fancycollapse').addClass('open').show();
				}
				function eduNoChecked(){
					$('.fancycollapse').removeClass('open').show();
				}
				$("#eduContinua").on( "click", eduChecked);
				$("#carrerasProf").on( "click", eduNoChecked);
			}
		}
	});

	/************BOTON VER MALLA EN ANIMACION DIGITAL*****************/
	$('.mallaBtn').on('click',function(){
		$('.segundaSeccionContainer').css({
			display: 'flex',
			height: 'auto'
		})
		$(this).css({
			opacity: 0
		})
	});

	/*****ABRIR TERMINOS Y CONDICIONES******/
	$('.checkBoxCont a').on('click',function(){
		$('.terminosContainer').css({
			display:'flex',
			zIndex: 101
		});
		setTimeout(terminosOpacityOn('.terminosContainer'), 200);
	})

	$('.check a').on('click',function(){
		$('.terminosContainer').css({
			display:'flex',
			zIndex: 101
		});
		setTimeout(terminosOpacityOn('.terminosContainer'), 200);
	})

	$('.closeButton').on('click',function(){
		$('.terminosContainer').css({
			display:'none',
			opacity: 0
		});
	})

	function terminosOpacityOn($Item){
		$($Item).animate({
			opacity: 1
		},500)
	}

	var ancho = $(window).width();
	var alto = $(window).height();
	TweenMax.set($('.menuLink'),{opacity:0})
	var checkMenu = true;
	var tl = new TimelineMax();


	// var contador = 0;
	/*FUNCION QUE HACE FUNCIONAR EL MENU RESPONSIVE*/
	$('.btn-sidebar').on('click',function(){
		// contador++;
		if(checkMenu === true){
			if (ancho > 768) {
				tl.to($('.menuResponsiveContainer'),.3,{left:'2.4%'})
				.staggerTo($('.menuLink'),.2,{opacity:1,y:'+=7%'},0.3)
				checkMenu = false;
			}else{
				tl.to($('.menuResponsiveContainer'),.3,{left:0})
				.staggerTo($('.menuLink'),.2,{opacity:1,y:'+=7%'},0.3)
				checkMenu = false;
			}
		}else{
			TweenMax.to($('.menuResponsiveContainer'),.5,{left:'100%',onComplete:ResponsiveinitialState});
			$('.menuLinkContenedor').removeClass('height9')
			checkMenu = true;
		}
		$('.btn-sidebar').toggleClass('toggle')
	});

	//FUNCION QUE HACE QUE SE CIERRE EL MENU CUANDO SE PRESIONA EN UN ENLACE CUALQUIERA
	$('.menuLinkSubMenu').on('click',function(){
		closeMenu();
	})

	$('.menuResponsiveFondoNegro').on('click',function(){
		closeMenu();
	})

	$('#logoTls').on('click',function(){
		closeMenu();
	})

	$('.menuLinkContenedor').on('click',function(){
		$(this).toggleClass('height9');
	})


	/*FUNCTION QUE REINICIA Y CIERRA EL MENU*/
	function closeMenu(){
		TweenMax.to($('.menuResponsiveContainer'),.5,{left:'100%',onComplete:ResponsiveinitialState});
		$('.btn-sidebar').removeClass('toggle');
		checkMenu = true;
	}

	/*FUNCTION QUE REINICIA LOS ITEMS DEL MENU*/
	function ResponsiveinitialState(){
		TweenMax.set($('.menuLink'),{opacity:0})
		tl.to($('.menuLink'),.2,{y:'-=10%'})
	}

	$('.box').on('click',function(){
		$('.box').find('.line').css({
			opacity:0
		})
		$(this).find('.line').css({
			opacity:1
		})
	});

	// PLAY YOUTUBE VIDEO EN TLS LAB
	$('.playVideo').on('click', function(ev) {
		$("#videoTLSLAB")[0].src += "&autoplay=1&loop=1";
		tl.to($('#videoTLSLAB'),.5,{opacity: '1'})
		ev.preventDefault();
	});

	/*FUNCION QUE PONE EL NOMBRE A LOS BOTONES DE CARRERAS PROFESIONALES*/

	$('.playVideo').on('click','img',function(){
		tl.to($('.modalVideoContainer'),.1,{display: 'initial'})
		.to($('.modalVideoContainer'),.5,{opacity: 1});
		TweenMax.to($('.bulletContainer'),.5,{display: 'none'})
		// tl.to($('header'),.5,{opacity: 0},'-.5')
		// .to($('header'),.1,{display: 'none'});
		tl.to($('header'),.5,{opacity: 0},'-.5');
		$.fn.fullpage.setAllowScrolling(false);
	})

	$('.closeModalButton').on('click',function(){
		tl.to($('.modalVideoContainer'),.5,{opacity: 0})
		.to($('.modalVideoContainer'),.1,{display: 'none'});
		TweenMax.to($('.bulletContainer'),.5,{display: 'initial'})
		// tl.to($('header'),.1,{display: 'flex'})
		// .to($('header'),.5,{opacity: 1},'-.3');
		tl.to($('header'),.5,{opacity: 1},'-.3');
		$.fn.fullpage.setAllowScrolling(true);
	})

	/*funcion que revisa las url y deacuerdo a eso le coloca el fondo blanco a los bullets*/
	function checkUrl(uri){
		for(var i = 0; i < uri.length; i++){
			if (URL.indexOf(uri[i]) != -1) {
				$('.bulletLi').addClass('dotsBlanco');
				break;
			}else{
				$('.bulletLi').removeClass('dotsBlanco');
			}
		}
	}

	$('.hMenuLink').on('mouseenter',function(){
		tl.to($(this),.1,{maxHeight: '30rem'})
		.to($(this).find('.hSubMenu'),.2,{opacity: 1})
	})

	$('.hMenuLink').on('mouseleave',function(){
		tl.to($(this).find('.hSubMenu'),.2,{opacity: 0})
		.to($(this),.2,{maxHeight: '1.5rem'})
	})


	// funcion que permite que se haga scroll sobre los tabs con contenido scroleable
	$('.tabsContent').on('mouseenter',function(){
		$.fn.fullpage.setAllowScrolling(false);
	})

	$('.tabsContent').on('mouseleave',function(){
		$.fn.fullpage.setAllowScrolling(true);
	})
	$('.linktoShow').on('click',function(){
		TweenMax.to($('.bulletContainer'),.1,{display: 'none'});
		tl.to($('#pqTlsModal'),.8,{zIndex: 2})
		.to($('#pqTlsModal'),.4,{opacity: 1,scale: 1})
		$.fn.fullpage.setAllowScrolling(false);

		var loopiteracion = $(this).data('loopiteracion');
		var titulo = $(this).data('titulo');
		var introduccion = $(this).data('introduccion');
		var imagen = $(this).data('imagen');		
		// var linkContainerOrigin = $(this).find('.parentLink');
		// var imageContainerOrigin = $(this).find('.imageContainerOrigin');
		$('#pqTlsModal .tittlePrincipal span').html(loopiteracion);
		$('#pqTlsModal .tittlePrincipal h2').html(titulo);
		$('#pqTlsModal .subTittle p').html(introduccion);
		$('#pqTlsModal .imgMainContainer img').attr({src:imagen});
		// $('#pqTlsModal .link').html(linkContainerOrigin);
		// $('#pqTlsModal .imgMainContainer').html(imageContainerOrigin)

		// $('#pqTlsModal').add('p').html('adsfasd');
		
	})

	$('#link1').on('click',function(){
		// TweenMax.to($('.bulletContainer'),.1,{display: 'none'});
		// tl.to($('#pqTlsModalIntern'),.8,{zIndex: 2})
		// .to($('#pqTlsModalIntern'),.4,{opacity: 1,scale: 1})
		// $.fn.fullpage.setAllowScrolling(false);
		$('#modal0').removeClass('slick-current');
		$('#modal0').removeClass('slick-active');
		$('#modal0').attr({tabindex:'-1'});
		
		$('#modal1').addClass(' slick-current');
		$('#modal1').addClass(' slick-active');
		$('#modal1').attr({tabindex:'0'});

		$('#slider1').children('.slick-list').children('.slick-track').css({transform:"translate3d(-2622px, 0, 0)"})
		// $('.single-item .slick-list .slick-track').css({transform:translate3d(-2622, 0, 0)})
	})

	

	// $('.pqTlsContent').on('click',function(){
	// 	TweenMax.to($('.bulletContainer'),.1,{display: 'none'});
	// 	tl.to($('#pqTlsModal'),.8,{zIndex: 2})
	// 	.to($('#pqTlsModal'),.4,{opacity: 1,scale: 1})
	// 	$.fn.fullpage.setAllowScrolling(false);
	// })

	$('.closePopUpButton').on('click',function(){
		TweenMax.to($('.bulletContainer'),.1,{display: 'initial'});
		tl.to($('#pqTlsModal'),.5,{right: '100%',opacity:'.8'})
		.to($('#pqTlsModal'),.1,{opacity: 0})
		.to($('#pqTlsModal'),.1,{right: '0',zIndex: '-1',scale: '0.1'})
		$.fn.fullpage.setAllowScrolling(true);
	})

	$('.closePopUp').on('click',function(){
		// TweenMax.to($('.bulletContainer'),.1,{display: 'initial'});
		// tl.to($('#pqTlsModalIntern'),.5,{right: '100%',opacity:'.8'})
		// .to($('#pqTlsModalIntern'),.1,{opacity: 0})
		// .to($('#pqTlsModalIntern'),.1,{right: '0',zIndex: '-1',scale: '0.1'})
		$.fn.fullpage.setAllowScrolling(false);
		$('#sliderHistorias').children('.slick-list').children('.slick-track').css({transform:"translate3d(-1311px, 0, 0)"})
		
	})

});