<div class="card">
	<div class="card-header">
		<i class="fas fa-plane" style="margin-right: 5px;"></i>
		<h4>Aircrafts</h4>
	</div>
	<div class="card-body overflow-auto" style="max-height: 300px;">	
		<table class="table table-hover table-striped text-center">
			<tr>
				<th class="text-left">Registration</th>
				<th>ICAO Type</th>
				<th>Company</th>
				<th>SubFleet</th>
			</tr>
		@foreach($aircrafts as $ac)
			<tr>
				<td class="text-left">{{ $ac->registration }}</td>
				<td>{{ $ac->icao }}</td>
				<td>{{ $ac->subfleet->airline->name }}</td>
				<td>{{ $ac->subfleet->name }}</td>
			</tr>
		@endforeach
		</table>
	</div>
</div>
