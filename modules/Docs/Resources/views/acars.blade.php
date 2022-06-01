@extends('docs::layouts.frontend')

@section('title', 'ACARS App Installation')
@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-book"></i> ACARS App Installation</h2>
          <p class="lead mb-5">Setting up ACARS.</p>

          <h3>Downloading the ACARS App</h3>
          <p>Download the ACARs ZIP from the downloads tab and unzip it to a convienient location of your choice.</p>
          <h3>ACARS App Configuation</h3>
          <p>When you open the app for the first time you should be presented with the settings screen (if not click the cog on bottom left).</p>
          <ul>
            <li>Set the URL to https://simplyconnectva.com/</li>
            <li>To get your API key visit <a href="https://simplyconnectva.com/profile" target="_blank">https://simplyconnectva.com/profile</a> and click <strong>Show API Key</strong> below your email address.</li>
            <li>The ACARS app is frequntly updated so turn on the check for beta updates option so you get kept up to date.</li>
            <li>Select your active simulator. <strong>MSFS ONLY</strong>: Click rescan scenery - this only needs done once or when you add new mods.</li>
          </ul>
          <p><strong>Click Save and restart your app. Before flying make sure you check the below simulator configuration to ensure your simulator is set up!</strong></p>
          <h3>Simulator Configuaration</h3>
          <h4>X-Plane Configuration</h4>
          <p>X-Plane uses a custom plugin. Open the ACARS\<code>X-Plane</code> folder, and copy the <code>AcarsConnect</code> folder into your <code>Resources\plugins</code> folder.</p>
          <h4>MSFS Configuration</h4>
          <p>To use MSFS, select "Microsoft Flight Simulator" from the simulator list and click 'Rescan Scenery'.</p>
          <p>Due to an MSFS limitation, sceneries purchased through the MSFS store can't be read because they're encrypted. Only sceneries purchased outside of the store and manually placed in the <code>Community</code> directory can be read</p>
          <h4>FSX/Prepar3d Configuration</h4>
          <p>To use FSX/Prepar3d, you need to install:</p>
          <ul>
            <li><a href="http://www.fsuipc.com/" target="_blank">FSUIPC</a> - the licensed version isn't required.</li>
            <li><a href="http://fsuipc.simflight.com/beta/MakeRwys.zip" target="_blank">MakeRwys</a></li>
          </ul>
          <p>After installing both, run <code>MakeRwys</code>. <code>MakeRwys</code> also needs to be re-run whenever there are scenery changes (if you want gates/runways to be updated).</p>
          <p>Here is a link to a video to help set up:</p>
          <p class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/_MpU2bjMMjI" allowfullscreen></iframe>
          </p>

        </div>
      </div>
    </div>
  </div>
@endsection