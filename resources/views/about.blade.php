@extends('master')
@section('nav')
<nav class="col-md-6 col-12 tm-nav">
	<ul class="tm-nav-ul">
		<li class="tm-nav-li"><a href="{{route('home.page')}}" class="tm-nav-link">@lang('words.home')</a></li>
		<li class="tm-nav-li"><a href="{{route('about.page')}}" class="tm-nav-link active">@lang('words.about')</a></li>
		<li class="tm-nav-li"><a href="{{route('contact.page')}}" class="tm-nav-link">@lang('words.contact')</a></li>
		<li class="tm-nav-li"><a href="{{route('login.page')}}" class="tm-nav-link">Log|In</a></li>
		<li class="tm-nav-li"><a href="/lang/en" class="tm-nav-link">EN</a></li>
		<li class="tm-nav-li"><a href="/lang/ru" class="tm-nav-link">RU</a></li>
		<li class="tm-nav-li"><a href="/lang/uz" class="tm-nav-link">UZ</a></li>
	</ul>
</nav>
@endsection
@section('content')
<main>
	<header class="row tm-welcome-section">
		<h2 class="col-12 text-center tm-section-title">{{$about['title_'.App::getLocale()]}}</h2>
		<p class="col-12 text-center">{!!$about['paragraph_'.App::getLocale()]!!}</p>
	</header>

	<div class="tm-container-inner tm-persons">
		<div class="row">
			<article class="col-lg-6">
				<figure class="tm-person">
					@foreach($cardTeam as $cardTeam)
					<img src="{{asset('temp/img/'.$cardTeam->cardImg)}}" alt="Image" class="img-fluid tm-person-img" />
					<figcaption class="tm-person-description">
						<h4 class="tm-person-name">{{$cardTeam['cardName_'.App::getLocale()]}}</h4>
						<p class="tm-person-title">{{$cardTeam['cardTitle_'.App::getLocale()]}}</p>
						<p class="tm-person-about">{!!$cardTeam['cardText_'.App::getLocale()]!!}</p>
						<div>
							<a href="{{'https://'.$cardTeam->cardFacebook}}" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
							<a href="{{'https://'.$cardTeam->cardInstagram}}" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
						</div>
					</figcaption>
					@endforeach
				</figure>
			</article>
		</div>
	</div>
	<div class="tm-container-inner tm-featured-image">
		<div class="row">
			<div class="col-12">
				<div class="placeholder-2">
					<div class="parallax-window-2" data-parallax="scroll" data-image-src="{{asset('temp/img/about-05.jpg')}}"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="tm-container-inner tm-features">
		<div class="row">
			@foreach($cardOffer as $cardOffer)
			<div class="col-lg-4">
				<div class="tm-feature">
					<i class="fas fa-4x fa-seedling tm-feature-icon"></i>
					<p class="tm-feature-description">{!!$cardOffer['cardText_'.App::getLocale()]!!}</p>
					<a href="{{route('home.page')}}" class="tm-btn tm-btn-primary">@lang('words.readMore')</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="tm-container-inner tm-history">
		<div class="row">
			<div class="col-12">
				<div class="tm-history-inner">
					<img src="{{asset('temp/img/'.$about->cardImg)}}" alt="Image" class="img-fluid tm-history-img" />
					<div class="tm-history-text">
						<h4 class="tm-history-title">{{$about['cardTitle_'.App::getLocale()]}}</h4>
						<p class="tm-mb-p">{!!$about['cardText_'.App::getLocale()]!!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection