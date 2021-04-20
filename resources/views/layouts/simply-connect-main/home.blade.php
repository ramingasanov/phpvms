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
					<div id="carousel-sotm" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-slide-to="0"></li>
							<li data-slide-to="1"></li>
							<li data-slide-to="2" class="active"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item">
								<img class="d-block w-100 img-fluid" alt="January Screenshot winner" src="\assets\frontend\img\potm\jan_2020.png"/>
								<div class="carousel-caption">
									<h4>Screenshot Competition - January 2021 - Winner</h4>
									<p>FlightSimmer7700</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 img-fluid" alt="February Screenshot winner" src="\assets\frontend\img\potm\feb_2021_1.png"/>
								<div class="carousel-caption">
									<h4>Screenshot Competition - February 2021 - Winner</h4>
									<p>Will J</p>
								</div>
							</div>
							<div class="carousel-item active">
								<img class="d-block w-100 img-fluid" alt="March Screenshot winner" src="\assets\frontend\img\potm\mar_2021_1.png"/>
								<div class="carousel-caption">
									<h4>Screenshot Competition - March 2021 - Winner</h4>
									<p>Thor</p>
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
				</div>
				<div class="col-md-2">
				</div>
			</div>
			<div class="row bg-black mt-3 p-3 text-white text-center">
				<div class="container">
					<p><span class="h4">Todays Stats:</span> {{Widget::todayStats(['type'=>'totalPireps'])}} | {{Widget::todayStats(['type'=>'totalHours'])}}</p>
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
