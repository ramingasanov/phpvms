<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport'/>

  <title>@yield('title') - {{ config('app.name') }}</title>

  {{-- Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things --}}
  <meta name="base-url" content="{!! url('') !!}">
  <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key: '' !!}">
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  {{-- End the required lines block --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ public_asset('/assets/frontend/img/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ public_asset('/assets/frontend/img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ public_asset('/assets/frontend/img/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ public_asset('/assets/frontend/img/site.webmanifest') }}">
  <link href="//fonts.googleapis.com/css?family=Kanit:200,300,400,700,200i,300i,400i,700i" rel="stylesheet"/>
  <link href="{{ public_asset('/assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ public_mix('/assets/frontend/css/now-ui-kit.css') }}" rel="stylesheet"/>
  <link href="{{ public_asset('/assets/frontend/css/styles.css') }}" rel="stylesheet"/>

  {{-- Start of the required files in the head block --}}
  <link href="{{ public_mix('/assets/global/css/vendor.css') }}" rel="stylesheet"/>
	{{-- Swiper CSS --}}
  <link href="{{ public_asset('/assets/frontend/css/swiper.min.css') }}" rel="stylesheet"/>
	{{-- Swiper JS --}}
  <script src="{{ public_asset('/assets/frontend/js/swiper.min.js') }}"></script>

  @yield('styles')

  {{-- End of the required stuff in the head block --}}

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-blue mb-0">
  <a class="navbar-brand text-white" href="{{ url('/') }}" style="margin-left: 20px;">
    <img src="{{ public_asset('/assets/frontend/img/sca_chain_logo.png') }}" width="135px" alt=""/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navigation">
    @include('nav')
  </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
  @yield('carousel')

  {{-- These should go where you want your content to show up --}}
  @include('flash.message')
  @yield('content')
  {{-- End the above block--}}

  @yield('lists')

  <div class="bg-light py-5">
    <div class="container sponsors">
      <div class="swiper swiper-sponsors">
        <div class="align-items-center d-flex swiper-wrapper">
          @foreach(File::glob(public_path() . '/assets/frontend/img/sponsors/*.png') as $logo)
            <div class="swiper-slide">
              <a class="d-block mx-3" href="https://{{strtr(basename($logo, '.png'), ['__' => '/'])}}" target="_blank">
                <img alt="{{basename(strtr($logo, ['__' => '/']), '.png')}}" src="{{strtr($logo, [public_path() . DIRECTORY_SEPARATOR => '/', DIRECTORY_SEPARATOR => '/'])}}?v=1">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script>
		const sponsorsSwiper = new Swiper('.swiper-sponsors', {
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: false,
			pagination: false,
      slidesPerView: 6,
      // spaceBetween: 30,
		});
  </script>

  <footer class="footer bg-blue text-white">
    <div class="container">
      <div class="copyright">
        &copy; {{ now()->format('Y') }} Simply Connect Virtual Airline
        {{--
            Please keep the copyright message somewhere, as-per the LICENSE file
            Thanks!!
        --}}
        Powered by <a href="http://www.phpvms.net" target="_blank">PHPVMS</a>
      </div>
    </div>
  </footer>
</div>

<script defer src="//use.fontawesome.com/releases/v5.15.1/js/all.js"></script>

{{-- Start of the required tags block. Don't remove these or things will break!! --}}
<script src="{{ public_mix('/assets/global/js/vendor.js') }}"></script>
<script src="{{ public_mix('/assets/frontend/js/vendor.js') }}"></script>
<script src="{{ public_mix('/assets/frontend/js/app.js') }}"></script>
@yield('scripts')

{{--
It's probably safe to keep this to ensure you're in compliance
with the EU Cookie Law https://privacypolicies.com/blog/eu-cookie-law
--}}
<script>
  window.addEventListener("load", function () {
    window.cookieconsent.initialise({
      palette: {
        popup: {
          background: "#edeff5",
          text: "#838391"
        },
        button: {
          "background": "#067ec1"
        }
      },
      position: "top",
    })
  });
</script>
{{-- End the required tags block --}}

<script>
  $(document).ready(function () {
    $(".select2").select2({width: 'resolve'});
  });
</script>

{{--
Google Analytics tracking code. Only active if an ID has been entered
You can modify to any tracking code and re-use that settings field, or
just remove it completely. Only added as a convenience factor
--}}
@php
$gtag = setting('general.google_analytics_id');
@endphp
@if($gtag)
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="//www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $gtag }}');
</script>
@endif
{{-- End of the Google Analytics code --}}

</body>
</html>
