@php
    $statname = "";
    if($type === 'totalPireps') {
        $statname = 'Flights Flown';
    } else if($type === 'totalHours') {
        $statname = ' Flown';
    }
@endphp
@if($type === 'totalHours')
@minutestotime($value)
@else
{{ $value }}
@endif
{{$statname}}