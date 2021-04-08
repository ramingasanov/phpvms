@extends('docs::layouts.frontend')

@section('title', 'ACARS App Installation')
@section('content')
<div class="container-fluid">
	<div class="row">
<div class="col-md-12">
    <h1>Setting up ACARS</h1>
    <h1>Downloading the ACARS App</h1>
    <p>Download the ACARs ZIP from the downloads tab and unzip it to a convienient location of your choice.</p>
    <h1>ACARS App Configuation</h1>
    <p>When you open the app for the first time you should be presented with the settings screen (if not click the cog on bottom left).</p>
    <ul>
    <li>Set the URL to https://simplyconnectva.com/</li>
    <li>To get your API key visit <a href="https://simplyconnectva.com/profile" target="_blank">https://simplyconnectva.com/profile</a> and click <strong>Show API Key</strong> below your email address.</li>
    <li>The ACARS app is frequntly updated so turn on the check for beta updates option so you get kept up to date.</li>
    <li>Select your active simulator. <strong>MSFS ONLY</strong>: Click rescan scenery - this only needs done once or when you add new mods.</li>
    </ul>
    <p><strong>Click Save and restart your app. Before flying make sure you check the below simulator configuration to ensure your simulator is set up!</strong></p>
    <h1>Simulator Configuaration</h1>
    <h2>X-Plane Configuration</h2>
    <p>X-Plane uses a custom plugin. Open the ACARS\<code>X-Plane</code> folder, and copy the <code>AcarsConnect</code> folder into your <code>Resources\plugins</code> folder.</p>
    <h2>MSFS Configuration</h2>
    <p>To use MSFS, select "Microsoft Flight Simulator" from the simulator list and click 'Rescan Scenery'.</p>
    <p>Due to an MSFS limitation, sceneries purchased through the MSFS store can't be read because they're encrypted. Only sceneries purchased outside of the store and manually placed in the <code>Community</code> directory can be read</p>
    <h2>FSX/Prepar3d Configuration</h2>
    <p>To use FSX/Prepar3d, you need to install:</p>
    <ul>
    <li><a href="http://www.fsuipc.com/" target="_blank">FSUIPC</a> - the licensed version isn't required.</li>
    <li><a href="http://fsuipc.simflight.com/beta/MakeRwys.zip" target="_blank">MakeRwys</a></li>
    </ul>
    <p>After installing both, run <code>MakeRwys</code>. <code>MakeRwys</code> also needs to be re-run whenever there are scenery changes (if you want gates/runways to be updated).</p>
    <p>Here is a link to a video to help set up:</p>
    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/_MpU2bjMMjI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
</div>
@endsection