@extends('app')
@section('title', 'Contact Us')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-envelope-open-text"></i> Contact Us</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet.</p>

          <form>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label py-1 text-sm-right" for="subject-field">Subject</label>
              <div class="col-sm-10">
                <input class="form-control py-2" id="subject-field" placeholder="Contact Subject" required type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label py-1 text-sm-right" for="name-field">Name</label>
              <div class="col-sm-10">
                <input class="form-control py-2" id="name-field" placeholder="Your Name" required type="text">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label py-1 text-sm-right" for="email-field">E-Mail</label>
              <div class="col-sm-10">
                <input class="form-control py-2" id="name-field" placeholder="email@domain.tld" required type="email">
              </div>
            </div>
            <div class="form-group row">
              <label for="submit-button" class="col-sm-2 col-form-label invisible text-sm-right">Submit?</label>
              <div class="col-sm-10">
                <button class="btn btn-primary" id="submit-button" type="submit">Send Message</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection