@extends('docs::layouts.frontend')

@section('title', 'PreRegister')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-user-plus"></i> Join Us</h2>
          <p class="lead mb-5">Please follow the instructions below to join us!</p>

          <p>Prior to signing up with <strong>Simply Connect</strong> please join the Discord Server with the pilot role. Your application will be rejected if you have not completed this step.</p>
          <p><a class="btn btn-sm btn-primary" href="https://discord.gg/p8dmube" role="button" target="_blank">Discord Invite</a></p>
          <p><b>In order to join us you must meet the following requirements and agree to our <a href="/docs/rules">rules</a>:</b></p>
          <ul>
            <li>I have read and agree to abide by the <a href="/docs/rules">rules</a> of <strong>Simply Connect Virtual Airline</strong>.</li>
            <li>I have joined the <a href="https://discord.gg/p8dmube" target="_blank">Discord Server</a> with the <em>pilot</em> role.</li>
            <li>I am 15 years or older.</li>
            <li>I own a legal, working copy of Microsoft Flight Simulator 2020, X-Plane 11 or Prepar3D on Windows.</li>
            <li>If I am flying online (VATSIM/IVAO, etc.) I agree to fly following all the rules of VATSIM/IVAO.</li>
            <li>I will submit my first flight within 30 days of joining, and at least one flight every 30 days thereafter.</li>
          </ul>
          <p><a class="btn btn-primary" href="/register" role="button">Continue to form</a></p>

        </div>
      </div>
    </div>
  </div>
@endsection