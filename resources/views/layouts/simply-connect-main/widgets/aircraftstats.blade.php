<div class="card">
	<div class="card-header">
		<i class="fas fa-plane" style="margin-right: 5px;"></i>
		<h4>Aircrafts By {{ ucfirst($type) }} @if ($type === 'icao') Type @endif</h4>
	</div>
	<div class="card-body">	
		<table class="table table-hover table-striped text-left">
			<tr>
				<th>{{ ucfirst($type) }} @if ($type === 'icao') Type @endif</th>
				<th class="text-center">AC Count</th>
			</tr>
		@foreach($acstats as $ac)
			<tr>
				<td>
					@if ($type === 'icao') {{ $ac->icao }} 
					@elseif ($type === 'location') <a href="{{route('frontend.airports.show', [$ac->airport_id])}}" target="_blank">{{ $ac->airport->name }}</a>
					@endif
				</td>
				<td class="text-center">{{ $ac->result }}</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>
