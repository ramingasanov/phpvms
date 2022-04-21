@extends('app')
@section('title', __('home.welcome.title'))

@section('carousel')
	<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper">
		<div class="swiper-wrapper">
			@foreach(File::glob(public_path() . '/assets/frontend/img/sca/*.jpg') as $image)
				<div class="swiper-slide">
					<img
						data-src="{{strtr($image, [public_path() . DIRECTORY_SEPARATOR => '/', DIRECTORY_SEPARATOR => '/'])}}"
						class="swiper-lazy"
					/>
					<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
				</div>
			@endforeach
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-pagination"></div>
	</div>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="row bg-black text-white">
				<div class="container py-5">
					<div class="row">
						<div class="col-md-8">
							<p>Welcome to the new Simply Connect Virtual Airline. We are still getting up and running so expect lots more content in the coming weeks. For now why not join us as an early adopter and help shape our future!</p>
							<p>To get started visit the <a href="#">join us page</a></pclass=>
							<p class="social-buttons mt-4 mb-0">
								@foreach([
									'youtube' => 'https://www.youtube.com/channel/UCdwdoC-FiKbgbZzbSXMGgzg',
									'discord' => 'https://discord.gg/p8dmube',
									'twitter' => 'https://twitter.com/agame_r',
									'facebook-f' => 'https://www.facebook.com/insideagamer7'
								] as $k => $v)
								<a target="_blank" href="{{$v}}" class="social-button">
									<i class="fab fa-{{$k}}"></i>
								</a>
								@endforeach
							</p>
						</div>
						<div class="col-md-4">
							<h4 class="mt-0">Today Stats</h4>
							<ul class="list-group">
								@foreach([
									'Total Pilots' => 153,
									'Total Flights' => 0,
									'Total Hours Flown' => 0,
									'Total Schedules' => 0,
									'Flights Today' => 101,
									'Flights This Month' => 1
								] as $k => $v)
									<li class="list-group-item d-flex justify-content-between align-items-center">
										{{$k}}
										<span class="badge badge-primary badge-pill">{{$v}}</span>
									</li>
								@endforeach
							</ul>
							<!--
							<p class="mb-0">
								{{Widget::todayStats(['type'=>'totalPireps'])}}
								<br>
								{{Widget::todayStats(['type'=>'totalHours'])}}
							</p>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('lists')
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6">
				<h3>Recent News</h3>
				<ul class="list-unstyled">
					<li class="media">
						<svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 64x64" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"></rect></svg>
						<div class="media-body">
							<h5 class="mt-0 mb-1">List Item</h5>
							<p>Lorem ipsum dolor sit amet.</p>
						</div>
					</li>
					<li class="media">
						<svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 64x64" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"></rect></svg>
						<div class="media-body">
							<h5 class="mt-0 mb-1">List Item</h5>
							<p>Lorem ipsum dolor sit amet.</p>
						</div>
					</li>
					<li class="media">
						<svg class="bd-placeholder-img mr-3" width="64" height="64" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 64x64" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"></rect></svg>
						<div class="media-body">
							<h5 class="mt-0 mb-1">List Item</h5>
							<p>Lorem ipsum dolor sit amet.</p>
						</div>
					</li>
				</ul>
			</div>
      <div class="col-md-6">
				<p><b>SimplyConnect</b> is a virtual airline (VA) which is an online organisation of flight simulator enthusiasts flying together in one community under one name. The idea is to make the flight simulator experience more realistic and enjoyable.</p>
				<p>We operate a varied fleet of aircraft, from turboprops right up to the latest most technologically advanced jet airliners. For the more advanced pilot in command we use both IVAO and VATSIM online gaming servers and for the less experienced we have an option of flying offline for you to get your bearings, We also host weekly online/offline group events for all.</p>
				<p>
					<a class="btn btn-primary" href="{{url('/page/about-us')}}">Learn More</a>
				</p>
			</div>
    </div>
  </div>
@endsection

@section('styles')
	<!-- Swiper CSS -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
	<style>
	@keyframes spin {
		to {
			transform: rotate(360deg);
		}
	}
	.swiper-button-prev {
		left: 40px;
	}
	.swiper-button-next {
		right: 40px;
	}
	.swiper-lazy-preloader {
		animation: spin 1s linear infinite;
	}
	.swiper {
		width: 100%;
		height: auto;
	}
	.swiper-slide {
		background: #000;
		padding-bottom: 56.25%;
		position: relative;
	}
	.swiper-slide img {
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	</style>
@endsection

@section('scripts')
	<!-- Swiper JS -->
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<!-- Initialize Swiper -->
	<script>
		const swiper = new Swiper(".swiper", {
			lazy: true,
			autoHeight: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	</script>
@endsection
