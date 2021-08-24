@if(isset($mapflights) && $mapflights->count() || !isset($mapflights) && $airports->count())
  <!-- Map Modal Button -->
  <div class="row">
    <div class="col">
      <div class="card p-0 mb-2 border-0">
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#MapModal" onclick="ExpandMap()">
          @if ($mapsource === 'user')
            @lang('DisposableTools::common.personal_map')
          @elseif ($mapsource === 'fleet')
            @lang('DisposableTools::common.fleet_map')
          @else
            @lang('DisposableTools::common.flights_map')
          @endif
        </button>
      </div>
    </div>
  </div>

  <!-- Map Modal -->
  <div class="modal" id="MapModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="FlightMapTitle" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 80%;">
      <div class="modal-content card-header shadow-none p-0" style="border-radius: 5px;">
        <div class="modal-header border-0 p-1">
          <h5 class="card-title m-0 p-0" id="FlightMapTitle">
            @if ($mapsource === 'user')
              @lang('DisposableTools::common.personal_map')
            @elseif ($mapsource === 'fleet')
              @lang('DisposableTools::common.fleet_map')
            @else
              @lang('DisposableTools::common.flights_map')
            @endif
          </h5>
          <span class="close"><i class="fas fa-times-circle" data-dismiss="modal" aria-label="Close" aria-hidden="true"></i></span>
        </div>
        <div class="modal-body border-0 p-0">
          <div id="FlightsMap" style="width: 100%; height: 80vh;"></div>
        </div>
        <div class="modal-footer border-0 text-right p-1">
          <span>
            @if (isset($citypairs))
              @lang('DisposableTools::common.citypairs'): {{ count($citypairs) }} |
            @endif
            @lang('DisposableTools::common.hubs'): {{ $airports->where('hub', '1')->count('id') }} |
            @lang('DisposableTools::common.airports'): {{ $airports->where('hub', '0')->count('id') }}
            @if (isset($mapflights))
              | {{ trans_choice('common.flight', 2) }}: {{ $mapflights->count('id') }}
            @endif
            @if (isset($aircraft))
              | @lang('common.aircraft'): {{ $aircraft->count('id') }}
            @endif
          </span>
        </div>
      </div>
    </div>
  </div>

  <!-- Map Leaflet Script -->
  @section('scripts')
    @parent
    <script type="text/javascript">
      function ExpandMap() {
        // Define Map Icons
        let RedIcon = new L.Icon({
          iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
          iconSize: [12, 20],
          shadowSize: [20, 20]
        });
        let GreenIcon = new L.Icon({
          iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
          iconSize: [12, 20],
          shadowSize: [20, 20]
        });
        let BlueIcon = new L.Icon({
          iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
          iconSize: [12, 20],
          shadowSize: [20, 20]
        });
        let YellowIcon = new L.Icon({
          iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
          shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
          iconSize: [12, 20],
          shadowSize: [20, 20]
        });

        // Build Hubs Layer Group
        let mHubs = L.layerGroup();
        @foreach($airports->where('hub', 1) as $hub)
          @php
            $hpop = "<a href='".route($hroute, [$hub->id])."' target='_blank'>".$hub->id.' '.$hub->name ?? ''."</a>";
            if (isset($aircraft) && isset($aroute) && $aircraft->where('airport_id', $hub->id)->count() > 0 && $aircraft->where('airport_id', $hub->id)->count() < 6) {
              $hpop = $hpop."<hr>";
              foreach($aircraft->where('airport_id', $hub->id) as $ac) {
                $hpop = $hpop."<a href='".route($aroute, [$ac->registration])."' target='_blank'>".$ac->registration." (".$ac->icao.")</a><br>";
              }
            } elseif (isset($aircraft)) {
              $hpop = $hpop."<hr>Parked Aircraft: ".$aircraft->where('airport_id', $hub->id)->count()."<br>";
            }
          @endphp
          var {{ $hub->id }} = L.marker([{{ $hub->lat }}, {{ $hub->lon }}], {icon: GreenIcon , opacity: 0.8}).bindPopup("{!! $hpop !!}").addTo(mHubs);
        @endforeach

        // Build Airports Layer Group
        let mAirports = L.layerGroup();
        @foreach($airports->where('hub', 0) as $airport)
          @php
            $apop = "<a href='".route('frontend.airports.show', [$airport->id])."' target='_blank'>".$airport->id.' '.$airport->name ?? ''."</a>";
            if (isset($aircraft) && isset($aroute) && $aircraft->where('airport_id', $airport->id)->count() > 0 && $aircraft->where('airport_id', $airport->id)->count() < 6) {
              $apop = $apop."<hr>";
              foreach($aircraft->where('airport_id', $airport->id) as $ac) {
                $apop = $apop."<a href='".route($aroute, [$ac->registration])."' target='_blank'>".$ac->registration." (".$ac->icao.")</a><br>";
              }
            } elseif (isset($aircraft)) {
              $apop = $apop."<hr>Parked Aircraft: ".$aircraft->where('airport_id', $airport->id)->count();
            }
          @endphp
          var {{ $airport->id }} = L.marker([{{ $airport->lat }}, {{ $airport->lon }}], {icon: BlueIcon , opacity: 0.8}).bindPopup("{!! $apop !!}").addTo(mAirports);
        @endforeach

        @if(isset($citypairs))
          // Build Flights Layer Group
          let mFlights = L.layerGroup();
          @foreach($citypairs as $citypair)
            @php
              $popuptext = "";
              foreach($mapflights->where('dpt_airport_id', substr($citypair['name'],0,4))->where('arr_airport_id', substr($citypair['name'],4,4)) as $mf) {
                if($mapsource === 'user') { $popuptext = $popuptext."<a href='/pireps/"; } else { $popuptext = $popuptext."<a href='/flights/"; }
                $popuptext = $popuptext.$mf->id."' target='_blank'><b>";
                $popuptext = $popuptext.$mf->airline->iata.$mf->flight_number." ".$mf->dpt_airport_id."-".$mf->arr_airport_id."</b></a><br>";
              }
              foreach($mapflights->where('dpt_airport_id', substr($citypair['name'],4,4))->where('arr_airport_id', substr($citypair['name'],0,4)) as $mf) {
                if($mapsource === 'user') { $popuptext = $popuptext."<a href='/pireps/"; } else { $popuptext = $popuptext."<a href='/flights/"; }
                $popuptext = $popuptext.$mf->id."' target='_blank'><b>";
                $popuptext = $popuptext.$mf->airline->iata.$mf->flight_number." ".$mf->dpt_airport_id."-".$mf->arr_airport_id."</b></a><br>";
              }
              if($userpairs->contains($citypair['name'])) { $cp_color = 'darkgreen'; }
              elseif($userpairs->contains(substr($citypair['name'],4,4).substr($citypair['name'],0,4))) { $cp_color = 'green'; }
              else { $cp_color = 'crimson' ;}
            @endphp
            {{ $citypair['name'] }} = L.geodesic([[{{ $citypair['dloc'] }}],[{{ $citypair['aloc'] }}]], {weight: 2, opacity: 0.8, steps: 5, color: '{{$cp_color}}'}).bindPopup("{!! $popuptext !!}").addTo(mFlights);
          @endforeach
        @endif

        // Define Base Layers For Control Box
        let DarkMatter = L.tileLayer.provider('CartoDB.DarkMatter');
        let NatGeo = L.tileLayer.provider('Esri.NatGeoWorldMap');
        let OpenSM = L.tileLayer.provider('OpenStreetMap.Mapnik');
        let WorldTopo = L.tileLayer.provider('Esri.WorldTopoMap');

        // Define Additional Overlay Layers
        let OpenAIP = L.
            tileLayer('http://{s}.tile.maps.openaip.net/geowebcache/service/tms/1.0.0/openaip_basemap@EPSG%3A900913@png/{z}/{x}/{y}.{ext}', {
            attribution: '<a href="https://www.openaip.net/">openAIP Data</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-NC-SA</a>)',
            ext: 'png',
            minZoom: 4,
            maxZoom: 14,
            tms: true,
            detectRetina: true,
            subdomains: '12'
          });

        // Define Control Groups
        let BaseLayers = {"Dark Matter": DarkMatter, "OpenSM Mapnik": OpenSM, "NatGEO World": NatGeo, "World Topo": WorldTopo};
        let Overlays = {"Hubs": mHubs, "Airports": mAirports, @if(isset($mapflights)) "Flights": mFlights,@endif "OpenAIP Data": OpenAIP};

        // Define Map and Add Control Box
        let FlightsMap = L.map('FlightsMap', {center: [{{ $mapcenter }}], zoom: 5, layers: [DarkMatter, mHubs, mAirports, @if(isset($mapflights)) mFlights @endif], scrollWheelZoom: false});
        L.control.layers(BaseLayers, Overlays).addTo(FlightsMap);
        setTimeout(function(){ FlightsMap.invalidateSize()}, 400);
      }
    </script>
  @endsection
@endif
