@extends('docs::layouts.frontend')

@section('title', 'Searching for Flights')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
			<div class="row">
				<div class="col-md-12">
					<h2><i class="fas fa-search"></i> Searching for Flights</h2>
					<p class="lead mb-5">Lorem ipsum dolor sit amet.</p>
					<h3>Finding a Flight</h3>
					<p>With over 6500 flights, it might seem overwhelming to find a flight you can do. This guide aims to help explain the easiest way to search for flights.</p>
					<h3>Searching the Website</h3>
					<ol>
						<li>Open the <a href='/flights'>flights</a> page. You should be presented with every flight across the airlines.</li>
						<li>As a new pilot I know I can fly any of the new pilot aircraft listed on the <a href='/docs/structure'>structure</a> page. I select the Citation CJ4 as the aircraft I wish to fly today and click search:<br/><img src='/assets/frontend/img/docs/searching/select-aircraft.png'/><br/>Alternatively I can search by Airline, Flight number, or Airport, or a combination of these.</li>
						<li>I am now presented with a list of routes I can fly. I can refine this further using the search again or I can select a flight.<br/><img src='/assets/frontend/img/docs/searching/aircraft-results.png'/><br/></li>
						<li>Once I've found the flight I can do, I can now click the "reserve flight icon" which will reserve the flight for me for 48 hours.<i class="fas fa-map-marker"></i></li>
						<li>If I go to <a href='/flights/bids'>my bids</a> I can now see, and manage the flights I've reserved<br/><img src='/assets/frontend/img/docs/searching/bids.png'/><br/></li>
						<li>I can now plan this flight with simbrief or load it straight in to ACARS using the below steps.</li>
					</ol>
					<h3>Planning with Simbrief (Optional)</h3>
					<p>Steps to plan your simbrief via the website will be here soon.</p>
					<h3>Getting Your Reserved Flight on ACARS</h3>
					<ol>
						<li>Open the ACARs app (If this is your first time please follow the setup instructions).</li>
						<li>Click the looking glass icon (Flight Search/Bids)<img src='/assets/frontend/img/docs/searching/acars-search.png'/></li>
						<li>Click "Bids"<img src='/assets/frontend/img/docs/searching/acars-bids.png'/></li>
						<li>You will now see a list of flights you have reserved. Click load on the appropriate one and it will be populated in to the main flight screen<br/><img src='/assets/frontend/img/docs/searching/acars-bids-list.png'/></li>
						<li>You can now populate any other information as required, select the aircraft you wish to use and fly as normal.</li>
						<li>Happy flying!</li>
					</ol>
				</div>
			</div>
		</div>
  </div>
</div>
@endsection