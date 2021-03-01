@extends('docs::layouts.frontend')

@section('title', 'Photocomp')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<h1>Simply Connect Screenshot Competition</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <p>Enter your best screenshot to the Discord channel each month! Best screenshot as voted by the Discord server wins!</p>
					<p class='h4'>Deadline: 22nd March 2021 - 1800z</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
                    <h4>The Rules</h4>
					<ul>
						<li class="list-item">Max two screenshots per pilot.</li>
						<li class="list-item">No photoshop or editing of screenshots (other than cropping).</li>
						<li class="list-item">Try to include a caption.</li>
						<li class="list-item">If your screenshot is of the external view of the aircraft it must be displaying the Simply Connect livery.</li>
                        <li class="list-item">Screenshots must be submitted in accordance with the submission guidelines by the date specified above.</li>
						<li class="list-item">You agree to allow Simply Connect VA to use your screenshot in various forms across Simply Connect Website and Social Media Platforms.</li>
					</ul>
				</div>
				<div class="col-md-6">
                    <h4>How to submit your screenshot</h4>
                    <p>Screenshots should be submitted to the "#va-screenshot-comp" channel within the Discord before the deadline above.</p>
                    <p>Voting will commence shortly after the deadline in the "#voting" channel, all members of the Discord server are eligble to vote for their top two favourite screenshots. <br/> The winner will be proudly displayed on the front page of the website and listed in the previous months winners</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mt-5">
                    <h3>Previous Months Winners</h3>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Month</th>
								<th>Theme</th>
								<th>1st Place</th>
								<th>2nd Place</th>
                                <th>3rd Place</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>January</td>
								<td>Simply Connect</td>
								<td>Flightsimmer7700<br/><img src='\assets\frontend\img\potm\jan_2020.png' alt='' class='img-thumbnail' width="400" height="400"/></td>
								<td>NYCE-87<br/><img src='\assets\frontend\img\potm\jan-2020-2.jpg' alt='' class='img-thumbnail' width="400" height="400"/></td>
                                <td>Floaty<br/><img src='\assets\frontend\img\potm\jan-2020-3.jpg' alt='' class='img-thumbnail' width="400" height="400"/></td>
							</tr>
							<tr>
								<td>January</td>
								<td>Simply Connect</td>
								<td>Floaty<br/><img src='\assets\frontend\img\potm\feb_2021_1.png' alt='' class='img-thumbnail' width="400" height="400"/></td>
								<td>Flightsimmer7700<br/><img src='\assets\frontend\img\potm\feb_2021_2.png' alt='' class='img-thumbnail' width="400" height="400"/></td>
                                <td>Harvey<br/><img src='\assets\frontend\img\potm\feb_2021_3.png' alt='' class='img-thumbnail' width="400" height="400"/></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
