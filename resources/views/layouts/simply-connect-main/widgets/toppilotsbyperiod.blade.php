<div class="card border-black-bottom dashboard-table">
	<h4 class="card-header">
		@if ($count === 1)
			Best Pilot of {{ ucfirst($rperiod) }} By {{ ucfirst($type) }}
		@else
			Top {{ $count }} Pilots of {{ ucfirst($rperiod) }} By {{ ucfirst($type) }}
		@endif
	</h4>
	<div class="card-body">
	@if(count($tpilots) > 0)	
		<table class="table table-hover table-striped text-center">
		@if($count > 1)
			<tr>
				<th class="text-left">Name</th>
				<th>{{ ucfirst($type) }}</th>
			</tr>
		@endif
		@foreach($tpilots as $tp)			
			<tr>
				<td class="text-left"><a href="{{ route('frontend.users.show.public', [$tp->user_id]) }}">{{ $tp->user->name_private }}</a></td>
			@if($type == 'time')
				<td> @minutestotime($tp->totals) </td>
			@elseif($type == 'distance')
				<td> @if (setting('units.distance') === 'km') {{ number_format($tp->totals * 1.852) }} @else {{ number_format($tp->totals) }} @endif {{ setting('units.distance') }} </td>
			@else
				<td> {{ number_format($tp->totals) }} </td>
			@endif				
			</tr>
		@endforeach
		</table>
	@else
		No Stats Available
	@endif
	</div>
</div>