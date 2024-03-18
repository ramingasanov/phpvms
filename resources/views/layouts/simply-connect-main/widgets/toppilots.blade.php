<div class="card">
	<div class="card-header bg-red">
		<i class="fas fa-medal" style="margin-right: 5px;"></i>
		<h4>Top {{ $count }} Pilots By {{ ucfirst($type) }}</h4>
	</div>
	<div class="card-body">
	@if(count($tpilots) > 0)
		<table class="table table-hover table-striped text-center">
			<tr>
				<th class="text-left">Name</th>
				<th>{{ ucfirst($type) }}</th>
			</tr>
			@foreach($tpilots as $tp)			
			<tr>
				<td class="text-left"><a href="{{route('frontend.profile.show', [$tp->user_id])}}">{{ $tp->user->name_private }}</a></td>
			@if($type === 'time')
				<td> @minutestotime($tp->totals) </td>
			@elseif($type === 'distance')
				<td> @if (setting('units.distance') === 'km') {{ number_format($tp->totals * 1.852) }} @else {{ number_format($tp->totals) }} @endif {{ setting('units.distance') }}</td>
			@else
				<td> {{ number_format($tp->totals) }}</td>
			@endif				
			</tr>
			@endforeach
		</table>
	@else
		No Stats Available
	@endif
	</div>
</div>
