<div class="card">
	<div class="card-header">
		<i class="fas fa-file-upload" style="margin-right: 5px;"></i>
		<h4>Pireps</h4>
	</div>
	<div class="card-body overflow-auto" style="max-height: 300px;">	
		<table class="table table-hover table-striped text-center">
			<tr>
				<th class="text-left">Ident</th>
				<th>Dep</th>
				<th>Arr</th>
				<th>Aircraft</th>
				<th>F.Time</th>
				<th>Pilot</th>
			</tr>
		@foreach($pireps as $pirep)
			<tr>
				<td class="text-left">{{ $pirep->airline->icao}}{{ $pirep->ident }}</td>
				<td>
				@if ($apicao <> $pirep->dpt_airport_id)
					<a href="{{ route('frontend.airports.show', [$pirep->dpt_airport_id]) }}">{{ $pirep->dpt_airport->icao }}</a>
				@else
					{{ $pirep->dpt_airport->icao }}
				@endif
				</td>
				<td>
				@if ($apicao <> $pirep->arr_airport_id)
					<a href="{{ route('frontend.airports.show', [$pirep->arr_airport_id]) }}">{{ $pirep->arr_airport->icao }}</a>
				@else
					{{ $pirep->arr_airport->icao }}
				@endif
				</td>
				<td>{{ $pirep->aircraft->registration }} ({{ $pirep->aircraft->icao }})</td>
				<td>@minutestotime($pirep->flight_time)</td>
				<td><a href="{{ route('frontend.users.show.public', [$pirep->user->id]) }}">{{ $pirep->user->name_private }}</a></td>
			</tr>
		@endforeach
		</table>
	</div>
</div>