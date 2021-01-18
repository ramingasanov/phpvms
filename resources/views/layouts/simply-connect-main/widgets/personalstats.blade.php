{{-- DEFINE YOUR TEXT HERE IF NEEDED ---}}
@php
    $last = 'Last' ;
    $days = 'Days' ;
    $noreports = 'No Reports' ;
    $statname = 'Personal Stats Widget' ;
    if($type === 'avglanding') { $statname = 'Average Landing Rate' ;}
    if($type === 'avgscore') { $statname = 'Average Score' ;}
    if($type === 'avgdistance') { $statname = 'Average Distance' ;}
    if($type === 'totdistance') { $statname = 'Total Distance' ;}
    if($type === 'avgtime') { $statname = 'Average Flight Time' ;}
    if($type === 'tottime') { $statname = 'Total Flight Time' ;}
    if($type === 'avgfuel') { $statname = 'Average Fuel Burn' ;}
    if($type === 'totfuel') { $statname = 'Total Fuel Burn' ;}
    if($type === 'totflight') { $statname = 'Total Flights' ;}
@endphp
@if($disp === 'full')
<div class="card">
    <div class="card-body detail-value text-center">
    @if($pstat <> 0)
        @if($type === 'avgtime' || $type === 'tottime')
            @minutestotime($pstat)
        @else
            {{ $pstat }}
        @endif
    @else
        {{ $noreports }}
    @endif           
        <div class="detail-name">{{ $statname }} @if($period)({{ $last }} {{ $period }} {{ $days }})@endif</div>
    </div>
</div>
@else
    @if($pstat <> 0)
        @if($type === 'avgtime' || $type === 'tottime')
            @minutestotime($pstat)
        @else
            {{ $pstat }}
        @endif
    @else
        {{ $noreports }}
    @endif  
@endif