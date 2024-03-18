@extends('app')
@section('title', __('home.welcome.title'))

@section('carousel')
<div style="background-color: #000;">
	<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper swiper-home">
		<div class="swiper-wrapper">
			@foreach(File::glob(public_path() . '/assets/frontend/img/2024_livery/*.{jpg,png}', GLOB_BRACE) as $image)
				<div class="swiper-slide">
					<img
					  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
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
</div>
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row bg-dark-green text-white">
					<div class="container py-5">
						<div class="row">
							<div class="col-md-8">
								<p><b>SimplyConnect</b> is a virtual airline (VA) which is an online organisation of flight simulator enthusiasts flying together in one community under one name. The idea is to make the flight simulator experience more realistic and enjoyable.</p>
								<p>We operate a varied fleet of aircraft, from turboprops right up to the latest most technologically advanced jet airliners. For the more advanced pilot in command we use both IVAO and VATSIM online gaming servers and for the less experienced we have an option of flying offline for you to get your bearings. We also host weekly online/offline group events for all.</p>
								<p>
									<a class="btn btn-primary" href="{{url('/page/about-us')}}">Learn More</a>
								</p>
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
								<ul class="list-group text-black">
									@foreach([
										'Total Pilots' => Widget::todayStats(['type'=>'totalPilots']),
										'Total Flights' => Widget::todayStats(['type'=>'totalFlights']),
										'Total Hours Flown' => Widget::todayStats(['type'=>'totalHours']),
										'Total Schedules' => Widget::todayStats(['type'=>'totalSchedules']),
										'Flights Today' => Widget::todayStats(['type'=>'totalPireps'])
									] as $k => $v)
										<li class="list-group-item d-flex justify-content-between align-items-center">
											{{$k}}
											<span class="badge badge-primary badge-pill">{{$v}}</span>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('lists')
  <div class="container py-5">
    <div class="row row-home">
      <div class="col-md-6">
				<div class="card">
					{{Widget::latestNews(['count' => 5])}}
				</div>
			</div>
      <div class="col-md-6">
				<div class="card">
					<div class="nav nav-tabs bg-light-green text-white" role="tablist">
						Vatsim Events
					</div>
					<iframe class="vatsim-events" src="https://my.vatsim.net/events/today"></iframe>
				</div>
			</div>
    </div>
  </div>
@endsection

@section('styles')
	<style>
	@keyframes spin {
		to {
			transform: rotate(360deg);
		}
	}
	@media only screen and (min-width: 990px) {
		.swiper-home .swiper-slide {
	    text-align: center;
	    font-size: 18px;
	    background: #000;
	    display: flex;
	    justify-content: center;
	    align-items: center;
		}

		.swiper-home {
			width: 60% !important;
		}
	}
	.swiper-home {
		width: 100%;
		border: 1px solid #7CB855;
	}
	.swiper-home .swiper-button-prev {
		left: 40px;
	}
	.swiper-home .swiper-button-next {
		right: 40px;
	}
	.swiper-home .swiper-lazy-preloader {
		animation: spin 1s linear infinite;
	}
	.swiper-home .swiper-slide {
		background: #000;
		padding-bottom: 56.25%;
		position: relative;
	}
	.swiper-home .swiper-slide img {
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
	<script>
		const gallerySwiper = new Swiper('.swiper-home', {
			autoHeight: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			lazy: true,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
		});
	</script>
@endsection
