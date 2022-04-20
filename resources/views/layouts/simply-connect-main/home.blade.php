@extends('app')
@section('title', __('home.welcome.title'))

@section('carousel')
	<div id="carousel-sotm" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-sotm" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-sotm" data-slide-to="1"></li>
			<li data-target="#carousel-sotm" data-slide-to="2"></li>
			<li data-target="#carousel-sotm" data-slide-to="3"></li>
			<li data-target="#carousel-sotm" data-slide-to="4"></li>
			<li data-target="#carousel-sotm" data-slide-to="5"></li>
			<li data-target="#carousel-sotm" data-slide-to="6"></li>
			<li data-target="#carousel-sotm" data-slide-to="7"></li>
			<li data-target="#carousel-sotm" data-slide-to="8"></li>
			<li data-target="#carousel-sotm" data-slide-to="9"></li>
			<li data-target="#carousel-sotm" data-slide-to="10"></li>
			<li data-target="#carousel-sotm" data-slide-to="11"></li>
			<li data-target="#carousel-sotm" data-slide-to="12"></li>
			<li data-target="#carousel-sotm" data-slide-to="13"></li>
			<li data-target="#carousel-sotm" data-slide-to="14"></li>
			<li data-target="#carousel-sotm" data-slide-to="15"></li>
			<li data-target="#carousel-sotm" data-slide-to="16"></li>
			<li data-target="#carousel-sotm" data-slide-to="17"></li>
		</ol>
		<div class="carousel-inner">
			<!-- <div class="carousel-item">
				<img class="d-block w-100 img-fluid" alt="January Screenshot winner" src="/assets/frontend/img/potm/jan_2020.png"/>
				<div class="carousel-caption">
					<h4>Screenshot Competition - January 2021 - Winner</h4>
					<p>FlightSimmer7700</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 img-fluid" alt="February Screenshot winner" src="/assets/frontend/img/potm/feb_2021_1.png"/>
				<div class="carousel-caption">
					<h4>Screenshot Competition - February 2021 - Winner</h4>
					<p>Will J</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 img-fluid" alt="March Screenshot winner" src="/assets/frontend/img/potm/mar_2021_1.png"/>
				<div class="carousel-caption">
					<h4>Screenshot Competition - March 2021 - Winner</h4>
					<p>Thor</p>
				</div>
			</div>
			<div class="carousel-item active">
				<img class="d-block w-100 img-fluid" alt="April Screenshot winner" src="/assets/frontend/img/potm/apr_2021_1.png"/>
				<div class="carousel-caption">
					<h4>Screenshot Competition - April 2021 - Winner</h4>
					<p>Steg</p>
				</div>
			</div> -->
			<div class="carousel-item active">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220303210120_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220303211117_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220303213425_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220304160506_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220304163235_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220308213812_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220302222247_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220302210807_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220207214414_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220123211809_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220111211404_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20220106205251_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211229213111_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211213171728_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211209113516_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211208210345_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211205095910_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img loading="lazy" class="d-block w-100 img-fluid" alt="Image Title" src="/assets/frontend/img/sca/20211116193111_1.jpg"/>
				<div class="carousel-caption">
					<h4>Image Title</h4>
					<p>Image description.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carousel-sotm" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
			<a class="carousel-control-next" href="#carousel-sotm" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
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
							<p class="mb-0">To get started visit the <a href="#">join us page</a></p>
						</div>
						<div class="col-md-4">
							<h4 class="mt-0">Today Stats</h4>
							<p class="mb-0">
								{{Widget::todayStats(['type'=>'totalPireps'])}}
								<br>
								{{Widget::todayStats(['type'=>'totalHours'])}}
							</p>
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
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
				<p>
					<a class="btn btn-primary" href="#">Learn More</a>
				</p>
			</div>
    </div>
  </div>
@endsection