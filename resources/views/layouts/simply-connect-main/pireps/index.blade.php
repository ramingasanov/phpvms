@extends('app')
@section('title', trans_choice('common.pirep', 2))

@section('content')
<div class="p-4">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ trans_choice('pireps.pilotreport', 2) }}</h2>
      @include('flash::message')
      @include('pireps.table')
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">
      {{ $pireps->links('pagination.default') }}
    </div>
  </div>
</div>
@endsection
