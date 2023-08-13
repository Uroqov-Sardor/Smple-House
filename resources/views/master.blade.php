<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Simple House</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="{{asset('temp/css/all.min.css')}}" rel="stylesheet" />
	<link href="{{asset('temp/css/templatemo-style.css')}}" rel="stylesheet" />
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->

<body>

	<div class="container">
		<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="{{asset('temp/img/simple-house-01.jpg')}}">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="{{asset('temp/img/simple-house-logo.png')}}" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">@lang('words.title')</h1>
								<h6 class="tm-site-description">@lang('words.text')</h6>
							</div>
						</div>
						@yield('nav')
					</div>
				</div>
			</div>
		</div>

		@yield('content')

		<footer class="tm-footer text-center">
			<p>@lang('words.footer')</p>
		</footer>
	</div>
	<script src="{{asset('temp/js/jquery.min.js')}}"></script>
	<script src="{{asset('temp/js/parallax.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			// Handle click on paging links
			$('.tm-paging-link').click(function(e) {
				e.preventDefault();

				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});

			// contact
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
				acc[i].addEventListener("click", function() {
					this.classList.toggle("active");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
						panel.style.maxHeight = null;
					} else {
						panel.style.maxHeight = panel.scrollHeight + "px";
					}
				});
			}
		});
	</script>
</body>

</html>