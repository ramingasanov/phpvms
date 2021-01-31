@extends('docs::layouts.frontend')

@section('title', 'PreRegister')

@section('content')
    <h1>Join Us</h1>
    <p>
        Prior to signing up with Simply Connect please join the Discord Server with the pilot role. Your application will be rejected if you have not completed this step.
        <h3><a href='https://discord.gg/qJnG3uyp' target='_blank'>Discord Invite</a></h3>
    </p>
    <p>
        <b>In order to join us you must meet the following requirements:</b>
        <form class='needs-validation'>
        <div class="input-group form-group-no-border"><input class="form-check-input" type="checkbox" value="" id="discord" required><label for="discord" class="control-label">I have joined the <a href='https://discord.gg/qJnG3uyp' target='_blank'>Discord Server</a> with the pilot role.</label>      <div class="invalid-feedback">
            You must agree before submitting.
          </div></div>
        <div class="input-group form-group-no-border"><input class="form-check-input" type="checkbox" value="" id="age" required><label for="age" class="control-label">I am aged 16 or older.</label>
            <div class="invalid-feedback">
            You must agree before submitting.
          </div></div>
        <div class="input-group form-group-no-border"><input class="form-check-input" type="checkbox" value="" id="software" required><label for="software" class="control-label">I own a legal, working copy of Microsoft Flight Simulator 2020, X-Plane or Prepar3D on Windows.</label>      <div class="invalid-feedback">
            You must agree before submitting.
          </div></div>
        {{-- <div class="input-group form-group-no-border">{{ Form::hidden('rules', 0, false) }}{{ Form::checkbox('rules', 1, null) }}<label for="rules" class="control-label">I agree to the rules and policies of the virtual airline.</label></div> --}}
        <div class="input-group form-group-no-border"><input class="form-check-input" type="checkbox" value="" id="online" required><label for="online" class="control-label">If I am flying online(VATSIM/IVAO) I agree to fly following all the rules of VATSIM/IVAO.</label>      <div class="invalid-feedback">
            You must agree before submitting.
          </div></div>
        <div class="input-group form-group-no-border"><input class="form-check-input" type="checkbox" value="" id="30day" required><label for="30day" class="control-label">I will submit my first flight within 30 days of joining, and at least one flight every 30 days thereafter.</label>      <div class="invalid-feedback">
            You must agree before submitting.
          </div></div>
        <div style="width: 100%; text-align: left; padding-top: 20px;"><a class="btn btn-primary continue" href="/register">Continue to form</a></div>
    </p>
    </form>
@endsection
@section('scripts')
  <script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    var button = document.querySelector('a.continue');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      button.addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
  </script>
@endsection