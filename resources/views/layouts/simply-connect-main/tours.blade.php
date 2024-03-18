@extends('app')
@section('title', 'Tours')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-map-marked-alt"></i> Tours</h2>
          <p class="lead mb-5">Discover &amp; explore. We understand that from time to time some pilots may want a break from flying our scheduled return flights. We&rsquo;ve created a series of tours for each aircraft class which will take you on a journey discovering different parts of the world.</p>

          <!--<ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a aria-controls="section-1-pane" aria-labelledby="section-1-tab" class="nav-link active" id="section-1-tab" data-toggle="tab" href="#section-1-pane" role="tab">Tab 1</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-2-pane" aria-labelledby="section-2-tab" class="nav-link" id="section-2-tab" data-toggle="tab" href="#section-2-pane" role="tab">Tab 2</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-3-pane" aria-labelledby="section-3-tab" class="nav-link" id="section-3-tab" data-toggle="tab" href="#section-3-pane" role="tab">Tab 3</a>
            </li>
          </ul>-->

          <div class="tab-content">
            <div class="tab-pane fade show active" id="section-1-pane" role="tabpanel">

              @foreach ([
                  0 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => '/assets/frontend/img/cargo-1.png',
                      'link' => '#',
                      'title' => 'F1 2022 Cargo Tour',
                  ],
              ] as $k => $v)
                <div class="border-bottom py-2">
                  <h3 class="mt-0">{{ $v['title'] }}</h3>
                  <img alt="{{ htmlspecialchars($v['title']) }}" class="d-block my-2" src="{{ public_asset($v['image']) }}">
                </div>
              @endforeach
              @foreach($flights as $flight)
                <div class="d-flex align-items-center">
                    <p class="flex-fill lead m-0">
                      @if(optional($flight->airline)->logo)
                          <img src="{{ $flight->airline->logo }}"  alt="{{$flight->airline->name}}"
                            style="max-width: 80px; width: 100%; height: auto;"/>
                      @endif
                      {{ $flight->ident }}
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->dpt_time) {{ $flight->dpt_time }} @else - @endif
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->arr_time) {{ $flight->arr_time }} @else - @endif
                    </p>
                  <p class="m-0">
                    <a class="btn btn-sm btn-info" href="{{ route('frontend.touraircraft', [$flight->id]) }}" role="button">Tour Legs &amp; Info</a>
                  </p>
                </div>
              @endforeach

            </div>

            <div class="tab-pane fade show active" id="section-2-pane" role="tabpanel">

              @foreach ([
                  0 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => '/assets/frontend/img/europetour.png',
                      'link' => '#',
                      'title' => 'Euro Capitals Tour',
                  ],
              ] as $k => $v)
                <div class="border-bottom py-2">
                  <h3 class="mt-0">{{ $v['title'] }}</h3>
                  <img alt="{{ htmlspecialchars($v['title']) }}" class="d-block my-2" src="{{ public_asset($v['image']) }}">
                </div>
              @endforeach
              <!-- @foreach($flights as $flight)
                <div class="d-flex align-items-center">
                    <p class="flex-fill lead m-0">
                      @if(optional($flight->airline)->logo)
                          <img src="{{ $flight->airline->logo }}"  alt="{{$flight->airline->name}}"
                            style="max-width: 80px; width: 100%; height: auto;"/>
                      @endif
                      {{ $flight->ident }}
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->dpt_time) {{ $flight->dpt_time }} @else - @endif
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->arr_time) {{ $flight->arr_time }} @else - @endif
                    </p>
                  <p class="m-0">
                    <a class="btn btn-sm btn-info" href="{{ route('frontend.touraircraft', [$flight->id]) }}" role="button">Tour Legs &amp; Info</a>
                  </p>
                </div>
               @endforeach-->

            </div>


            <div class="tab-pane fade show active" id="section-2-pane" role="tabpanel">

              @foreach ([
                  0 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => '/assets/frontend/img/simply-connect-ga-tour-banner.png',
                      'link' => '#',
                      'title' => 'GA One Tour',
                  ],
              ] as $k => $v)
                <div class="border-bottom py-2">
                  <h3 class="mt-0">{{ $v['title'] }}</h3>
                  <img alt="{{ htmlspecialchars($v['title']) }}" class="d-block my-2" src="{{ public_asset($v['image']) }}">
                </div>
              @endforeach
              <!-- @foreach($flights as $flight)
                <div class="d-flex align-items-center">
                    <p class="flex-fill lead m-0">
                      @if(optional($flight->airline)->logo)
                          <img src="{{ $flight->airline->logo }}"  alt="{{$flight->airline->name}}"
                            style="max-width: 80px; width: 100%; height: auto;"/>
                      @endif
                      {{ $flight->ident }}
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->dpt_time) {{ $flight->dpt_time }} @else - @endif
                    </p>
                    <p class="flex-fill lead m-0">
                      @if($flight->arr_time) {{ $flight->arr_time }} @else - @endif
                    </p>
                  <p class="m-0">
                    <a class="btn btn-sm btn-info" href="{{ route('frontend.touraircraft', [$flight->id]) }}" role="button">Tour Legs &amp; Info</a>
                  </p>
                </div>
               @endforeach-->

            </div>
            <div class="tab-pane fade" id="section-2-pane" role="tabpanel">...</div>
            <div class="tab-pane fade" id="section-3-pane" role="tabpanel">...</div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
