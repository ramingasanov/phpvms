<div class="card border-black-bottom dashboard-table">
	<h4 class="card-header">
	{{-- @if ($rtype === 'Departures')
		<i class="fas fa-plane-departure" style="margin-right: 5px;"></i>
	@elseif ($rtype === 'Arrivals')
		<i class="fas fa-plane-arrival" style="margin-right: 5px;"></i>
	@endif --}}
		Top {{ $count }} Airports By {{ $rtype }}
	</h4>
	<div class="card-body">
		<table class="table table-hover table-striped text-center">
			<tr>
				<th class="text-left">Name</th>
				<th>{{ $rtype }}</th>
			</tr>
		@foreach($tairports as $ta)	
			<tr>
			@if ($rtype === 'Departures')
				<td class="text-left"><a href="{{ route('frontend.airports.show', [$ta->dpt_airport_id]) }}">{{ $ta->dpt_airport->name }}</a></td>
			@elseif ($rtype === 'Arrivals')
				<td class="text-left"><a href="{{ route('frontend.airports.show', [$ta->arr_airport_id]) }}">{{ $ta->arr_airport->name }}</a></td>
			@endif
				<td>{{ number_format($ta->tusage) }}</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>