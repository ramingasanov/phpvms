@extends('app')
@section('title', 'Tours')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
            <div class="row">
                @include('flash::message')
                <div class="col-md-12">
                  @include('tour-table')
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
@endsection
