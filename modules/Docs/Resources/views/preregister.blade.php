@extends('docs::layouts.frontend')

@section('title', 'PreRegister')

@section('content')
    <h1>Join Us</h1>
    <p>
        Prior to signing up with Simply Connect please join the Discord Server with the pilot role. Your application will be rejected if you have not completed this step.
        <h3><a href='https://discord.gg/p8dmube' target='_blank'>Discord Invite</a></h3>
    </p>
    <p>
        <b>In order to join us you must meet the following requirements and agree to our <a href="/docs/rules">rules</a>:</b>
        <ul>
          <li class="list-item">I have read and agree to abide by the <a href="/docs/rules">rules</a> of Simply Connect Virtual Airline.</li>
          <li class="list-item">I have joined the <a href='https://discord.gg/p8dmube' target='_blank'>Discord Server</a> with the pilot role.</li>
          <li class="list-item">I am 15 years or older.</li>
          <li class="list-item">I own a legal, working copy of Microsoft Flight Simulator 2020, X-Plane 11 or Prepar3D on Windows.</li>
          <li class="list-item">If I am flying online(VATSIM/IVAO etc) I agree to fly following all the rules of VATSIM/IVAO.</li>
          <li class="list-item">I will submit my first flight within 30 days of joining, and at least one flight every 30 days thereafter.</li>
        </ul>
        <div style="width: 100%; text-align: left; padding-top: 20px;"><a class="btn btn-danger continue" href="/register">Continue to form</a></div>
@endsection