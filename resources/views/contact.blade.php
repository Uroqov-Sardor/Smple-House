@extends('master')
@section('nav')
<nav class="col-md-6 col-12 tm-nav">
	<ul class="tm-nav-ul">
		<li class="tm-nav-li"><a href="{{route('home.page')}}" class="tm-nav-link">@lang('words.home')</a></li>
		<li class="tm-nav-li"><a href="{{route('about.page')}}" class="tm-nav-link">@lang('words.about')</a></li>
		<li class="tm-nav-li"><a href="{{route('contact.page')}}" class="tm-nav-link active">@lang('words.contact')</a></li>
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
		<h2 class="col-12 text-center tm-section-title">{{$contact['title_'.App::getLocale()]}}</h2>
		<p class="col-12 text-center">{!!$contact['text_'.App::getLocale()]!!}</p>
	</header>

	<div class="tm-container-inner-2 tm-contact-section">
		<div class="row">
			<div class="col-md-6">
				{{session('msg')}}
				<form action="{{route('send.message')}}" method="POST" class="tm-contact-form">
					@csrf
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="@lang('words.name')" required="" />
					</div>

					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="@lang('words.email')" required="" />
					</div>

					<div class="form-group">
						<textarea rows="5" name="message" class="form-control" placeholder="@lang('words.message')" required=""></textarea>
					</div>

					<div class="form-group tm-d-flex">
						<button type="submit" class="tm-btn tm-btn-success tm-btn-right">
							@lang('words.send')
						</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="tm-address-box">
					<h4 class="tm-info-title tm-text-success">{{$contact['address_'.App::getLocale()]}}</h4>
					<address>
						{!!$contact['addressText_'.App::getLocale()]!!}
					</address>
					<a href="{{'tel:'.$contact->phone}}" class="tm-contact-link">
						<i class="fas fa-phone tm-contact-icon"></i>{{$contact->phone}}
					</a>
					<a href="{{'mailto:'.$contact->email}}" class="tm-contact-link">
						<i class="fas fa-envelope tm-contact-icon"></i>{{$contact->email}}
					</a>
					<div class="tm-contact-social">
						<a href="{{'https://'.$contact->fac}}" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
						<a href="{{'https://'.$contact->ins}}}" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
	<div class="tm-container-inner-2 tm-map-section">
		<div class="row">
			<div class="col-12">
				<div class="tm-map">
					<iframe src="{{$contactLocation->locationLink}}" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="tm-container-inner-2 tm-info-section">
		<div class="row">
			<!-- FAQ -->
			<div class="col-12 tm-faq">
				<h2 class="text-center tm-section-title">{{$cardFaq['title_'.App::getLocale()]}}</h2>
				<p class="text-center">{!!$cardFaq['text_'.App::getLocale()]!!}</p>
				<div class="tm-accordion">
					@foreach($cardFaqData as $cardFaqData)
					<button class="accordion">{{$cardFaqData['title_'.App::getLocale()]}}</button>
					<div class="panel">
						<p>{!!$cardFaqData['text_'.App::getLocale()]!!}</p>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</main>
@endsection