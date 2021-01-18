<div class="card">
    <div class="card-header">
        <i class="fas fa-folder-open" style="margin-right: 5px;"></i>   
        <h4>@if($wairlineid) Airline @endif Statistics</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped text-left">
            <tr>
                <th style="width: 50%">Pilots</th>
                <td class="text-right">{{ $wtotalpilot }}</td>
            </tr>
            @if(!$wairlineid)
            <tr>
                <th>Aircrafts</th>
                <td class="text-right">{{ $wtotalaircraft }}</td>
            </tr>
            @endif
            <tr>
                <th>Flights</th>
                <td class="text-right">{{ $wtotalflight }}</td>
            </tr>
            <tr>
                <th style="width: 50%">Pireps</th>
                <td class="text-right">{{ $wtotalpirep }}</td>
            </tr>
            <tr>
                <th>Flight Time</th>
                <td class="text-right"> @minutestotime($wtotaltime)</td>
            </tr>
            <tr>
                <th>Distance</th>
                <td class="text-right">
                @if (setting('units.distance') === 'km') {{ number_format(round($wtotaldistance * 1.852)) }} 
                @else {{ number_format(round($wtotaldistance)) }} 
                @endif {{ setting('units.distance') }}
                </td>
            </tr>
            <tr>
                <th>Fuel Burn</th>
                <td class="text-right">
                @if (setting('units.weight') === 'kg') {{ number_format(round($wtotalfuel / 2.205)) }} 
                @else {{ number_format(round($wtotalfuel)) }} 
                @endif {{ setting('units.weight') }}
                </td>
            </tr>
        </table>
    </div>
</div>
