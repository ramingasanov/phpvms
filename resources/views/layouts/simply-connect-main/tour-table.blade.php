@foreach($flights as $flight)
  <div class="card border-black-bottom">
    <div class="card-body" style="min-height: 0">
      <div class="row">
        <div class="col-sm-9">
          <h5>
            <a class="text-c" href="{{ route('frontend.flights.show', [$flight->id]) }}">
              @if(optional($flight->airline)->logo)
                  <img src="{{ $flight->airline->logo }}"  alt="{{$flight->airline->name}}"
                    style="max-width: 80px; width: 100%; height: auto;"/>
              @endif
              {{ $flight->ident }}
            </a>
          </h5>
        </div>
        <div class="col-sm-3 align-top text-right">
          {{--
          !!! NOTE !!!
          Don't remove the "save_flight" class, or the x-id attribute.
          It will break the AJAX to save/delete

          "x-saved-class" is the class to add/remove if the bid exists or not
          If you change it, remember to change it in the in-array line as well
          --}}
          @if (!setting('pilots.only_flights_from_current') || $flight->dpt_airport_id == $user->current_airport->icao)
            <button class="btn btn-round btn-icon btn-icon-mini save_flight
                          {{ isset($saved[$flight->id]) ? 'btn-danger':'' }}"
                    x-id="{{ $flight->id }}"
                    x-saved-class="btn-danger"
                    type="button"
                    title="@lang('flights.addremovebid')">
              <i class="fas fa-map-marker"></i>
            </button>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-sm-7">
          {{--<table class="table-condensed"></table>--}}
          <span class="title">{{ strtoupper(__('flights.dep')) }}&nbsp;</span>
          {{ optional($flight->dpt_airport)->name ?? $flight->dpt_airport_id }}
          (<a href="{{route('frontend.airports.show', ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>)
          @if($flight->dpt_time), {{ $flight->dpt_time }}@endif
          <br/>
          <span class="title">{{ strtoupper(__('flights.arr')) }}&nbsp;</span>
          {{ optional($flight->arr_airport)->name ?? $flight->arr_airport_id }}
          (<a href="{{route('frontend.airports.show', ['id' => $flight->arr_airport_id])}}">{{$flight->arr_airport_id}}</a>)
          @if($flight->arr_time), {{ $flight->arr_time }}@endif
          <br/>
          @if(filled($flight->callsign))
          <span class="title">{{ strtoupper(__('flights.callsign')) }}&nbsp;</span>
          {{ $flight->airline->icao }} {{ $flight->callsign }}
          <br/>
        @endif
          @if($flight->distance)
            <span class="title">{{ strtoupper(__('common.distance')) }}&nbsp;</span>
            {{ $flight->distance }} {{ setting('units.distance') }}
            <br/>
          @endif
          @if($flight->level)
            <span class="title">{{ strtoupper(__('flights.level')) }}&nbsp;</span>
            {{ $flight->level }} {{ setting('units.altitude') }}
            <br/>
          @endif
        </div>
        <div class="col-sm-5">
          @if($flight->flight_time)
            <span class="title">Estimated Flight Time&nbsp;</span>
            {{ $flight->flight_time }} Minutes
          @endif
          <br/>
          <span class="title">Available Aircraft&nbsp;</span>
          <table class="table table-responsive table-sm table-striped" id="aircrafts-table">
            @if(count($flight->subfleets))
              <thead>
              <th>Type</th>
              <th>Name</th>
              </thead>
            @endif
            <tbody>
            @foreach($flight->subfleets as $sf)
              <tr>
                <td>{{ $sf->type }}</td>
                <td>{{ $sf->name }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
      	<div class="col-sm-12 text-right">
          @if ($acars_plugin)
	          @if (isset($saved[$flight->id]))
	            <a href="vmsacars:bid/{{ $saved[$flight->id] }}" class="btn btn-sm btn-outline-primary">Load in vmsACARS</a>
	          @else
	            <a href="vmsacars:flight/{{ $flight->id }}" class="btn btn-sm btn-outline-primary">Load in vmsACARS</a>
	          @endif
	        @endif
	    </div>
        <div class="col-sm-12 text-left">
          <!-- Simbrief enabled -->
          @if ($simbrief !== false)
            <!-- If this flight has a briefing, show the link to view it-->
            @if ($flight->simbrief && $flight->simbrief->user_id === $user->id)
              <a href="{{ route('frontend.simbrief.briefing', $flight->simbrief->id) }}"
                class="btn btn-sm btn-dark">
                View Simbrief Flight Plan
              </a>
            @else
            <!-- Show button if the bids-only is disable, or if bids-only is enabled, they've saved it -->
            @if ($simbrief_bids === false || ($simbrief_bids === true && isset($saved[$flight->id])))
              <div class="row">
			    <div class="col-md-12">
			      <h2>Select Aircraft for Flight</h2>
			    </div>
			  </div>

			  <div class="row">
			    <div class="col-md-12">
			      <select id="aircraftselection" class="form-control select2" onchange="checkacselection()">
			        <option value="ZZZZZ">Please Select An Aircraft</option>
			          @foreach($aircrafts as $ac)
			            <option value="{{ $ac->id }}">[{{ $ac->icao }}] {{ $ac->registration }} @if($ac->registration != $ac->name)'{{ $ac->name }}'@endif</option>
			          @endforeach
			      </select>
			    </div>
			    <div class="col-md-12 text-right">
			      <a id="generate_link" style="visibility: hidden"
			         href="{{ route('frontend.simbrief.generate') }}?flight_id={{ $flight->id }}"
			         class="btn btn-primary">Proceed To Flight Planning</a>
			    </div>
			  </div>

              @endif
            @endif
          @endif

          {{-- <a href="{{ route('frontend.pireps.create') }}?flight_id={{ $flight->id }}"
            class="btn btn-sm btn-danger">
            {{ __('pireps.newpirep') }}
          </a> --}}
        </div>
      </div>
    </div>
  </div>
@endforeach

@section('scripts')
  <script type="text/javascript">
    // Simple Aircraft Selection With Dropdown Change
    // Also keep Generate button hidden until a valid AC selection
    const $oldlink = document.getElementById("generate_link").href;

    function checkacselection() {
      if (document.getElementById("aircraftselection").value === "ZZZZZ") {
        document.getElementById('generate_link').style.visibility = 'hidden';
      } else {
        document.getElementById('generate_link').style.visibility = 'visible';
      }
      const selectedac = document.getElementById("aircraftselection").value;
      const newlink = "&aircraft_id=".concat(selectedac);

      document.getElementById("generate_link").href = $oldlink.concat(newlink);
    }
  </script>
@endsection