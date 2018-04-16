<header id="header">
	<div class="headerContainer">
		<a id="logoTls" href="{{ URL::to('/') }}"><img class="headerLogo" src="{{ asset('web/img/LogoTls/logo_tls_cel_nar.svg') }}" alt=""></a>
		<div class="menuContainer">
			<div class="headerMenu">
				@if(count($menu) > 0 )
                    @foreach($menu as $me)
					<div class="hMenuLink">
						<a href="{{ $me->url }}">{{ $me->nombre }}</a>
						@if($me->sublink_1 || $me->sublink_2 || $me->sublink_3 || $me->sublink_4 || $me->sublink_5)
							<div class="hSubMenu">
								@if($me->sublink_1 && $me->url_1)
								<a target="_blank" href="{{$me->url_1}}">{{$me->sublink_1}}</a>
								@endif
								@if($me->sublink_2 && $me->url_2)
								<a target="_blank" href="{{$me->url_2}}">{{$me->sublink_2}}</a>
								@endif
								@if($me->sublink_3 && $me->url_3)
								<a target="_blank" href="{{$me->url_3}}">{{$me->sublink_3}}</a>
								@endif
								@if($me->sublink_4 && $me->url_4)
								<a target="_blank" href="{{$me->url_4}}">{{$me->sublink_4}}</a>
								@endif
								@if($me->sublink_5 && $me->url_5)
								<a target="_blank" href="{{$me->url_5}}">{{$me->sublink_5}}</a>
								@endif
							</div>
						@endif
					</div>
					@endforeach
                @endif
			</div>
			<div class="menuSearch">
				<div class="search">
					<input type="text">
					<img src="{{ asset('web/img/Icons/Search.svg') }}" alt="">
				</div>
				<div class="searchIcons">
					<img src="{{ asset('web/img/Icons/Phone.svg') }}" alt="">
					<img src="{{ asset('web/img/Icons/Wassap.svg') }}" alt="">
					<img src="{{ asset('web/img/Icons/Letter.svg') }}" alt="" style="width: 20%;">
				</div>
			</div>
		</div>
	</div>
</header>