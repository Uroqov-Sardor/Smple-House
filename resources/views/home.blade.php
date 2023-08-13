@extends('master')
@section('nav')
<nav class="col-md-6 col-12 tm-nav">
	<ul class="tm-nav-ul">
		<li class="tm-nav-li"><a href="{{route('home.page')}}" class="tm-nav-link active">@lang('words.home')</a></li>
		<li class="tm-nav-li"><a href="{{route('about.page')}}" class="tm-nav-link">@lang('words.about')</a></li>
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
		<h2 class="col-12 text-center tm-section-title">{{$homes['title_'.\App::getLocale()]}}</h2>
		<p class="col-12 text-center">{!!$homes['paragraph_'.\App::getLocale()]!!}</p>
	</header>
	<div class="tm-paging-links">
		<nav>
			<ul>
				<li class="tm-paging-item"><a href="#" class="tm-paging-link active">@lang('words.pizza')</a></li>
				<li class="tm-paging-item"><a href="#" class="tm-paging-link">@lang('words.salad')</a></li>
				<li class="tm-paging-item"><a href="#" class="tm-paging-link">@lang('words.noodle')</a></li>
			</ul>
		</nav>
	</div>

	<!-- Gallery -->
	<div class="row tm-gallery">
		<!-- gallery page 1 -->
		<div id="tm-gallery-page-pizza" class="tm-gallery-page">
			@foreach($homeCards as $homeCard)
			<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
				<figure>
					<img src="{{asset('temp/img/'.$homeCard->cardImg)}}" alt="Image" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title">{{$homeCard['cardTitle_'.App::getLocale()]}}</h4>
						<p class="tm-gallery-description">{!!$homeCard['cardText_'.App::getLocale()]!!}</p>
						<p class="tm-gallery-price">{{$homeCard->cardPrice}}</p>
					</figcaption>
				</figure>
			</article>
			@endforeach
		</div> <!-- gallery page 1 -->

		<!-- gallery page 2 -->
		<div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
			@foreach($cardSalads as $cardSalad)
			<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
				<figure>
					<img src="{{asset('temp/img/'.$cardSalad->cardImg)}}" alt="Image" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title">{{$cardSalad['cardTitle_'.App::getLocale()]}}</h4>
						<p class="tm-gallery-description">{!!$cardSalad['cardText_'.App::getLocale()]!!}</p>
						<p class="tm-gallery-price">{{$cardSalad->cardPrice}}</p>
					</figcaption>
				</figure>
			</article>
			@endforeach
		</div> <!-- gallery page 2 -->

		<!-- gallery page 3 -->
		<div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
			@foreach($cardNoodles as $cardNoodle)
			<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
				<figure>
					<img src="{{asset('temp/img/'.$cardNoodle->cardImg)}}" alt="Image" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title">{{$cardNoodle['cardTitle_'.App::getLocale()]}}</h4>
						<p class="tm-gallery-description">{!!$cardNoodle['cardText_'.App::getLocale()]!!}</p>
						<p class="tm-gallery-price">{{$cardNoodle->cardPrice}}</p>
					</figcaption>
				</figure>
			</article>
			@endforeach
		</div> <!-- gallery page 3 -->

	</div>
	<div class="tm-section tm-container-inner">
		<div class="row">
			<div class="col-md-6">
				<figure class="tm-description-figure">
					<img src="{{asset('temp/img/'.$homes->cardImg)}}" alt="Image" class="img-fluid" />
				</figure>
			</div>
			<div class="col-md-6">
				<div class="tm-description-box">
					<h4 class="tm-gallery-title">{{$homes['cardTitle_'.\App::getLocale()]}}</h4>
					<p class="tm-mb-45">{!!$homes['cardText_'.\App::getLocale()]!!}</p>
					<a href="about.html" class="tm-btn tm-btn-default tm-right">@lang('words.readMore')</a>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection