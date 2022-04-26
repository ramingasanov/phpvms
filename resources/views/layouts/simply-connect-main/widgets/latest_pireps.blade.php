<table class="table table-striped">
  <thead>
    <tr>
      <th>Flight Number</th>
      <th>Captain</th>
      <th>Departed</th>
      <th>Arrived</th>
      <th>Aircraft</th>
      <th>Miles Flown</th>
      <th>Landing Rate</th>
    </tr>
  </thead>
  <tbody>
  @foreach($pireps as $p)
    <tr>
      <td><span class="title">{{ $p->airline->code }} {{ $p->flight_number }}</span></td>
      <td>{{$p->user->name_private}}</td>
      <td><a href="{{route('frontend.airports.show', [$p->dpt_airport_id])}}">{{$p->dpt_airport->name}}</a></td>
      <td><a href="{{route('frontend.airports.show', [$p->arr_airport_id])}}">{{$p->arr_airport->name}}</a></td>
      <!-- <td>{{ $p->aircraft->icao }}</td> -->
      <td>{{$p->distance}}</td>
      <td>{{ $p->landing_rate }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
