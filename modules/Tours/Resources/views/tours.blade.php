@extends('tours::layouts.frontend')

@section('title', 'Tours')

@section('content')
    <h1>Name of tour</h1>

    <p>
        Description of tour<br />
        Map of tour<br />
        Stats<br />
        Allowed aircraft<br />
        @if(!$flights->isEmpty())
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Leg</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Distance (add in time)</th>
                <th scope="col">Book</th>
              </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <th scope="row">{{$flight->route_leg}}</th>
                    <td>{{$flight->dpt_airport->name}} ({{$flight->dpt_airport_id}})</td>
                    <td>{{$flight->arr_airport->name}} ({{$flight->dpt_airport_id}})</td>
                    <td>{{$flight->distance}}</td>
                    <td>Book button here (make sure pilot has done the last flight first)</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        @else
        No tour found
        @endif

    </p>
@endsection
