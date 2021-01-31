@extends('app')
@section('title', __('home.welcome.title'))

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>
					Welcome to Simply Connect VA
				</h1>
			</div>
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8">
					<div class="carousel slide" id="carousel-395379">
						<ol class="carousel-indicators">
							<li data-slide-to="0" data-target="#carousel-395379" class="active"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" alt="Carousel Bootstrap First" src="\assets\frontend\img\potm\jan_2020.png" style="height: 800px"/>
								<div class="carousel-caption">
									<h4>
										January 2021
									</h4>
									<p>
										Flightsimmer 7700
									</p>
								</div>
							</div>
						</div> <a class="carousel-control-prev" href="#carousel-395379" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-395379" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
					</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-5">
                    <p>Welcome to the new Simply Connect Virtual Airline. We are still getting up and running so expect lots more content in the coming weeks. For now why not join us as an early adopter and help shape our future!</p>
                    <p>To get started visit the join us page</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
