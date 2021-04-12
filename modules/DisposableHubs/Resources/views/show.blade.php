@extends('app')
@section('title', __('DisposableHubs::common.hubtitle'))

@section('content')
  {{-- SHOW HUB DETAILS WITH PILOTS AIRCRAFT AND FLIGHTS --}}
  <div class="row">
    <div class="col">
      {{-- <h3 class="card-title">@lang('DisposableHubs::common.hubdetails') : {{ $hub->name ?? $hub->id }}</h3> --}}
    </div>
  </div>

  {{-- ROW 1 BASIC HUB DATA AND MAP --}}
  <div class="row">
    {{-- LEFT --}}
    <div class="col-6">
      <div class="card mb-2">
        <div class="card-header p-1">
          <h5 class="p-0 m-1">
            <i class="fas fa-info float-right"></i>
            {{ $hub->name ?? $hub->id }}
          </h5>
        </div>
        <div class="card-body p-0">
          <table class="table table-sm table-borderless table-striped mb-0">
            <tr>
              <th scope="row" style="width: 40%;">ICAO @lang('DisposableHubs::common.code')</th>
              <td>{{ $hub->id }}</td>
            </tr>
            <tr>
              <th scope="row">IATA @lang('DisposableHubs::common.code')</th>
              <td>{{ $hub->iata }}</td>
            </tr>
            <tr>
              <th scope="row">@lang('DisposableHubs::common.location')</th>
              <td>{{ $hub->location }}</td>
            </tr>
            @if(filled($hub->country))
              <tr>
                <th scope="row">@lang('common.country')</th>
                <td>{{ $country->alpha2($hub->country)['name'] }} ({{ strtoupper($hub->country) }})</td>
              </tr>
            @endif
            <tr>
              <th scope="row">@lang('DisposableHubs::common.timezone')</th>
              <td>{{ $hub->timezone }}</a></td>
            </tr>
            @if($hub->ground_handling_cost > 0)
              <tr>
                <th scope="row">@lang('DisposableHubs::common.groundh') @lang('DisposableHubs::common.cost')</th>
                <td>{{ $hub->ground_handling_cost }} {{ setting('units.currency') }}/Flight</td>
              </tr>
            @endif
            @if($hub->fuel_100ll_cost > 0)
              <tr>
                <th scope="row">@lang('DisposableHubs::common.fuel') / 100LL @lang('DisposableHubs::common.cost')</th>
                <td>
                  @if(setting('units.fuel') === 'kg') 
                    {{ number_format(($hub->fuel_100ll_cost/2.20462262185),2) }} 
                  @else 
                    {{ $hub->fuel_100ll_cost }} 
                  @endif
                  {{ setting('units.currency') }}/{{ ucfirst(setting('units.fuel')) }}
                </td>
              </tr>
            @endif
            @if($hub->fuel_mogas_cost > 0)
              <tr>
                <th scope="row">@lang('DisposableHubs::common.fuel') / MOGAS @lang('DisposableHubs::common.cost')</th>
                <td>
                  @if(setting('units.fuel') === 'kg')
                    {{ number_format(($hub->fuel_mogas_cost/2.20462262185),2) }}
                  @else
                    {{ $hub->fuel_mogas_cost }}
                  @endif
                  {{ setting('units.currency') }}/{{ ucfirst(setting('units.fuel')) }}
                </td>
              </tr>
            @endif
            @if($hub->fuel_jeta_cost > 0)
              <tr>
                <th scope="row">@lang('DisposableHubs::common.fuel') / JETA1 @lang('DisposableHubs::common.cost')</th>
                <td>
                  @if(setting('units.fuel') === 'kg')
                    {{ number_format(($hub->fuel_jeta_cost/2.20462262185),2) }} 
                  @else 
                    {{ $hub->fuel_jeta_cost }} 
                  @endif
                  {{ setting('units.currency') }}/{{ ucfirst(setting('units.fuel')) }}
                </td>
              </tr>
            @endif
          </table>
        </div>
      </div>
      @if(count($hub->files) > 0 && Auth::check())
        <div class="card mb-2">
          <div class="card-header p-1">
            <h5 class="p-0 m-1">
              <i class="fas fa-download float-right"></i>
              {{ trans_choice('DisposableHubs::common.hub', 1) }} {{ trans_choice('common.download',2) }}
            </h5>
          </div>
          <div class="card-body p-0">
            @include('downloads.table', ['files' => $hub->files])
          </div>
        </div>
      @endif
    </div>
    {{-- RIGHT --}}
    <div class="col-6">
      <div class="card mb-2 border-0 shadow-none">
          {{ Widget::AirspaceMap(['width' => '100%', 'height' => '400px', 'lat' => $hub->lat, 'lon' => $hub->lon,]) }}
      </div>
    </div>
  </div>

  <ul class="nav nav-pills nav-fill mb-2" id="pills-tab" role="tablist">
    <li class="nav-item pr-1 pl-1" role="presentation">
      <a class="nav-link active" id="pills-pilots-tab" data-toggle="pill" href="#pills-pilots" role="tab" aria-controls="pills-pilots" aria-selected="true">@lang('DisposableHubs::common.hubplt')</a>
    </li>
    <li class="nav-item pr-1 pl-1" role="presentation">
      <a class="nav-link" id="pills-aircrafts-tab" data-toggle="pill" href="#pills-aircrafts" role="tab" aria-controls="pills-aircrafts" aria-selected="false">@lang('DisposableHubs::common.hubac')</a>
    </li>
    <li class="nav-item pr-1 pl-1" role="presentation">
      <a class="nav-link" id="pills-flights-tab" data-toggle="pill" href="#pills-flights" role="tab" aria-controls="pills-flights" aria-selected="false">@lang('DisposableHubs::common.hubflts')</a>
    </li>
    @if($disptools)
      <li class="nav-item pr-1 pl-1" role="presentation">
        <a class="nav-link" id="pills-pireps-tab" data-toggle="pill" href="#pills-pireps" role="tab" aria-controls="pills-pireps" aria-selected="false">@lang('DisposableHubs::common.hubreps')</a>
      </li>
    @endif
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-pilots" role="tabpanel" aria-labelledby="pills-pilots-tab">
      <div class="row row-cols-2">
        @include('DisposableHubs::show_pilots')
      </div>    
    </div>
    <div class="tab-pane fade" id="pills-aircrafts" role="tabpanel" aria-labelledby="pills-aircrafts-tab">
      <div class="row row-cols-2">
        @include('DisposableHubs::show_aircrafts')
      </div>
    </div>
    <div class="tab-pane fade" id="pills-flights" role="tabpanel" aria-labelledby="pills-flights-tab">
      <div class="row row-cols-2">
        @include('DisposableHubs::show_flights')
      </div>
    </div>
    @if($disptools)
      <div class="tab-pane fade" id="pills-pireps" role="tabpanel" aria-labelledby="pills-pireps-tab">
        <div class="row">
          <div class="col">
            @widget('Modules\DisposableTools\Widgets\AirportPireps', ['location' => $hub->id])
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection
