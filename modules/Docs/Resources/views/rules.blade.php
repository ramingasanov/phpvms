@extends('docs::layouts.frontend')

@section('title', 'Rules and Support')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1>Rules and Support</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<h2>Our Rules</h2>
			<p class="font-weight-normal">At Simply Connect we try to be relatively laid back and relaxed with our flights however we do expect pilots to abide by the below basic rules</p>
            <h3>Membership Policy</h3>
            <p class="font-weight-normal">In order to join us and make your experience worthwhile you must:
			<ul>
				<li class="list-item">be 16 years or older.</li>
                <li class="list-item">be a member of our Discord server and provide your Discord username on registration.</li>
                <li class="list-item">have a legal, working version of Microsoft Windows with at least one of the following simulators: X-Plane 11, Microsoft Flight Simulator 2020, FSX, or Prepar3D.</li>
                <li class="list-item">complete your first flight with us within 30 days of joining.</li>
			</ul>
            <h3>Conduct and Behaviours Policy</h3>
            <p class="font-weight-normal">All pilots and staff must:</p>
			<ul>
				<li class="list-item">be friendly and respectful to fellow pilots and staff.</li>
                <li class="list-item">not act in a way that causes offence to others.</li>
                <li class="list-item">be willing to contribute to the Simply Connect community in a positive manner.</li>
                <li class="list-item">when representing the virtual airline not act in any way inappropriate or in a way that could tarnish the reputation of Simply Connect or anyone connected to Simply Connect.</li>
			</ul>
            <p class="font-weight-normal">Anyone acting inappropriately will be removed from the airline.</p>
            <h3>Minimum flight requirements and inactivity Policy</h3>
            <p class="font-weight-normal">Pilots are expected to fly their first flight within 30 days of joining and then at least every 30 days thereafter.</p>
            <p class="font-weight-normal">If you are unable to meet these minimum requirements, then we can set your account to on leave upon request via a ticket raised on the Discord server as per the help and support section. Setting your account to on leave ensures you do not lose your account or your activity. It is your responsibility to inform us of any extended leave.</p>
            <p class="font-weight-normal">Anyone who does not file a flight within 30 days of their last one or from joining and is not on leave and does not inform us of an extended leave will have their account set to inactive. All inactive accounts are deleted 30 days after this.</p>
            <p class="font-weight-normal">If you are on leave or inactive then to become active again simply fly a flight and your account status will be restored</p>
            <p class="font-weight-normal">Deleted accounts are irrecoverable along with any record of flights flown with Simply Connect.<p>
            <h3>Flying Policy</h3>
            <p class="font-weight-normal">Where possible all flights should be one of our scheduled flights however we currently allow pilots to fly their own custom/charter flight as they wish. Additionally pilots should ensure they are aware of the following notes:</p>
            <ul>
                <li class="list-item">Pilots can only fly aircrafts allowed within their rank or below.</li>
                <li class="list-item">Pilots must fly the same aircraft they pick when booking the flight on the acars app.</li>
                <li class="list-item">Pilots should check the latest NOTAMs on the website to keep up to date with changes.</li>
                <li class="list-item">Pilots should keep their ACARS software up to date when prompted.</li>
                <li class="list-item">Pilots should ensure they use the flight plan generation on the website or directly on a flight planning tool like Simbrief to ensure they plan the most efficenet route.</li>
                <li class="list-item">Only flights filed within the ACARs app are accepted, any manual pireps will be rejected</li>
            </ul>
            <p class="font-weight-normal">Pilots should also be aware that flight reports are checked and audited and may be rejected if the wrong aircraft is used or there are concerns over the validity of the flight report. Consistently filing wrong reports may lead to the downranking or suspension of a pilot.</p>

            <h3>Flying Online Policy</h3>
            <p class="font-weight-normal">Flying online via one of the virtual air traffic control networks allows you to experience the next level of immersion with simulator flying. While you don't need to be a real-life pilot to fly online we highly recommend you are comfortable with the below aspects of flying before taking to an online network:</p>
            <ul>
                <li class="list-item">You are comfortable with the simulator you are using and the aircraft you are flying.</li>
                <li class="list-item">You have an understanding of how air traffic control works and the phraseology involved.</li>
                <li class="list-item">You are able to fly SIDs/STARs and understand an IFR flight plan.</li>
            </ul>
            <p class="font-weight-normal">For more details on flying online with simply connect please see our dedicated <a href="/docs/flying-online">flying online page</a></p>
		</div>
		<div class="col-md-4">
			<h3>Help and Support</h3>
			<p class="font-weight-normal">Raise a ticket via "#va-support-tickets" for support with the following:
                <ul>
                    <li class="list-item">Help using the website.</li>
                    <li class="list-item">Help using the tracking app (ACARS) (attach your log file!).</li>
                    <li class="list-item">Reporting bugs or issues.</li>
                    <li class="list-item">Feedback - Good and Bad.</li>
                    <li class="list-item">Requesting leave for over 30 days.</li>
                    <li class="list-item">Any other issues or concerns.</li>
                </ul>
            Alternatively you can also email: <a href="mailto:support@simplyconnectva.com">support@simplyconnectva.com</a>
            </p>
            <p>Raise a ticket via "#ask-the-pilot" for help with the following:</p>
            <ul>
                <li class="list-item">Help/Advice flying an aircraft.</li>
                <li class="list-item">Understanding how a particular system works.</li>
                <li class="list-item">Dealing with emergencies.</li>
            </ul>
		</div>
	</div>
</div>
@endsection