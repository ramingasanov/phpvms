@if($random_flights->count() > 0)
  <div class="card mb-2">
    <div class="card-header p-1">
      <h5 class="m-1 p-0">
        {{ trans_choice('DisposableTools::common.randomflt', $random_flights->count()) }}
        <i class="fas fa-random float-right"></i>
      </h5>
    </div>
    <div class="card-body p-0">
      <table class="table table-sm table-borderless table-striped mb-0 text-center">
        <tr>
          <th class="text-left">@lang('DisposableTools::common.flight')</th>
          <th>@lang('DisposableTools::common.orig')</th>
          <th>@lang('DisposableTools::common.dest')</th>
          <th>{{ trans_choice('common.pirep', 1) }}</th>
          <th class="text-right">@lang('DisposableTools::common.expire')</th>
        </tr>
        @foreach ($random_flights as $rf)
          <tr>
            <td class="text-left">
              <a href="{{ route('frontend.flights.show', [$rf->flight_id]) }}">{{ $rf->flight->airline->code.' '.$rf->flight->flight_number }}</a>
            </td>
            <td>
              <a href="{{ route('frontend.airports.show', [$rf->flight->dpt_airport_id]) }}" title="{{ optional($rf->flight->dpt_airport)->name }}">{{ $rf->flight->dpt_airport_id }}</a>
            </td>
            <td>
              <a href="{{ route('frontend.airports.show', [$rf->flight->arr_airport_id]) }}" title="{{ optional($rf->flight->arr_airport)->name }}">{{ $rf->flight->arr_airport_id }}</a>
            </td>
            <td>
              @if (optional($rf->pirep)->state == 2) 
                <i class="fas fa-check-circle text-success"></i>
              @else 
                <i class="fas fa-times-circle text-danger"></i>
              @endif
            </td>
            <td class="text-right">{{ Carbon::parse($rf->assign_date)->endOfDay()->DiffForHumans() }}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endif
