@extends('app')
@section('title', trans_choice('common.pilot', 2))

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-plane"></i> {{ trans_choice('common.pilot', 2) }}</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet.</p>
          <p class="mb-5 mt-0"><img alt="" class="d-block h-auto mx-auto my-0 w-100" src="{{ public_url('/assets/frontend/img/airline-staff.svg') }}?v=1"></p>
          @include('users.table')
          {{ $users->links('pagination.default') }}
        </div>
      </div>
    </div>
  </div>
@endsection
