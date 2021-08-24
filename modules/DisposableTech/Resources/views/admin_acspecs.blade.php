@extends('admin.app')
@section('title', 'Disposable Aircraft Specs')

@section('content')
  <div class="card border-blue-bottom" style="margin-left:5px; margin-right:5px; margin-bottom:5px;">
    <div class="content">
      <p>Specifications saved for a subfleet will be used by all aircrafts in that fleet, also defining special specs for an aircraft is possible.</p>
      <p>Some of the info defined here may be used for SimBrief flight planning purposes to generate a proper flight plan matching exact specs of the simulator addon being used.</p>
      <p>Most important fields for SimBrief planning are <b>DOW, MZFW, MTOW, MLW and Fuel Capacity</b> =marked as (1)= also if you wish <b>ATC fields</b> may be used too</p>
      <p>For ATC fields to be passed/used, all 3 ATC related items should be entered (wake turbulance category, equipment, transponder) =marked as (2)=.</p>
      <p><b>Aircraft definitions have priority.</b> Use them when really necessary, defining specs only for Subfleets is advised (as like PhpVms)</p>
      <p>&nbsp;</p>
      <p>Developed by <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; 2021</p>
    </div>
  </div>

  <div class="row text-center" style="margin:10px;"><h4 style="margin: 5px; padding:0px;"><b>Aircraft & SubFleet Specifications</b></h4></div>

  <div class="row" style="margin-left:5px; margin-right:5px;">
    <div class="card border-blue-bottom" style="padding:10px;">
      @if($specs && $specs->id)
        {{ Form::open(array('action' => '\Modules\DisposableTech\Http\Controllers\TechSpecsController@dtupdatespecs', 'method' => 'post')) }}
        <input type="hidden" name="id" value="{{ $specs->id }}">
      @else
        {{ Form::open(array('action' => '\Modules\DisposableTech\Http\Controllers\TechSpecsController@dtstorespecs', 'method' => 'post')) }}
      @endif
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-4">
            <label class="pl-1 mb-1" for="subfleet_id">Select Pre-Recorded Specs for Editing</label>
            <select id="specs_selection" class="form-control" onchange="checkselection()">
              <option value="0">Please Select A Record</option>
              @foreach($allspecs as $listspec)
                @php
                  if($listspec->subfleet) { $listdesc = $listspec->subfleet->type; }
                  elseif($listspec->aircraft) { $listdesc = $listspec->aircraft->registration; }
                  else { $listdesc = 'Mandatory Object Not Found !'; }
                @endphp
                <option value="{{ $listspec->id }}" @if($specs && $listspec->id == $specs->id) selected @endif>{{ $listspec->id }} : {{ $listspec->saircraft }} | {{ $listdesc }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-4 text-left align-middle"><br>
            <a id="edit_link" style="visibility: hidden" href="{{ route('DisposableTech.dtacspecs') }}" class="btn btn-primary pl-1 mb-1">Load Selected Record For Edit</a>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-4">
            <label class="pl-1 mb-1" for="subfleet_id">SubFleet</label>
            <select id="subfleet_selection" name="subfleet_id" class="form-control">
              <option value="0">Please Select A Subfleet</option>
              @foreach($subfleets->sortBy('name') as $subfleet)
                <option value="{{ $subfleet->id }}" @if($specs && $subfleet->id == $specs->subfleet_id) selected @endif>{{ $subfleet->type }} : {{ $subfleet->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-4">
            <label class="pl-1 mb-1" for="aircraft_id">Aircraft</label>
            <select id="aircraft_selection" name="aircraft_id" class="form-control">
              <option value="0">Please Select An Aircraft</option>
              @foreach($aircrafts->sortBy('registration') as $aircraft)
                <option value="{{ $aircraft->id }}" @if($specs && $aircraft->id == $specs->aircraft_id) selected @endif>{{ $aircraft->registration }} @if($aircraft->registration != $aircraft->name)'{{ $aircraft->name }}'@endif : {{ $aircraft->icao }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="icao">ICAO Code (OFP & ATC)</label>
            <input name="icao" type="text" class="form-control" placeholder="B738" maxlength="4" value="{{ $specs->icao ?? '' }}">
          </div>
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="name">Aircraft Type Name (OFP)</label>
            <input name="name" type="text" class="form-control" placeholder="B737-800" maxlength="20" value="{{ $specs->name ?? '' }}">
          </div>
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="engines">Engine Name (OFP)</label>
            <input name="engines" type="text" class="form-control" placeholder="CFM56-7B26" maxlength="20" value="{{ $specs->engines ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="paxwgt">Passenger Weight</label>
            <input name="paxwgt" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="500" value="{{ $specs->paxwgt ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="bagwgt">Baggage Weight</label>
            <input name="bagwgt" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="300" value="{{ $specs->bagwgt ?? '' }}">
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="bew">Basic Empty Weight</label>
            <input name="bew" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->bew ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="dow">Dry Operating Weight (1)</label>
            <input name="dow" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->dow ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mzfw">Max Zero Fuel Weight (1)</label>
            <input name="mzfw" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->mzfw ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mrw">Max Ramp/Taxi Weight</label>
            <input name="mrw" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->mrw ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mtow">Max Take Off Weight (1)</label>
            <input name="mtow" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->mtow ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mlw">Max Landing Weight (1)</label>
            <input name="mlw" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->mlw ?? '' }}">
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mrange">Max Range</label>
            <input name="mrange" type="number" class="form-control" placeholder="{{ setting('units.distance') }}" min="0" max="99999" value="{{ $specs->mrange ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mceiling">Max Ceiling</label>
            <input name="mceiling" type="number" class="form-control" placeholder="{{ setting('units.altitude') }}" min="0" max="99999" value="{{ $specs->mceiling ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mfuel">Max Fuel Capacity (1)</label>
            <input name="mfuel" type="number" class="form-control" placeholder="{{ setting('units.weight') }}" min="0" max="999999" value="{{ $specs->mfuel ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mpax">Max Seat Capacity</label>
            <input name="mpax" type="number" class="form-control" placeholder="189" min="0" max="999" value="{{ $specs->mpax ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="mspeed">Max Speed</label>
            <input name="mspeed" type="number" class="form-control" placeholder="mach or {{ setting('units.speed') }}" min="0" step="0.01" max="9999" value="{{ $specs->mspeed ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="cspeed">Optimum Speed</label>
            <input name="cspeed" type="number" class="form-control" placeholder="mach or {{ setting('units.speed') }}" min="0" step="0.01" max="9999" value="{{ $specs->cspeed ?? '' }}">
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="cat">ATC Wake Turb. Category (2)</label>
            <input name="cat" type="text" class="form-control" placeholder="M" maxlength="1" value="{{ $specs->cat ?? '' }}">
          </div>
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="equip">ATC Equipment (2)</label>
            <input name="equip" type="text" class="form-control" placeholder="SDE1FGHIJ2J3J5RWY" maxlength="30" value="{{ $specs->equip ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="transponder">ATC Transponder (2)</label>
            <input name="transponder" type="text" class="form-control" placeholder="SB1" maxlength="30" value="{{ $specs->transponder ?? '' }}">
          </div>
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="pbn">ATC PBN</label>
            <input name="pbn" type="text" class="form-control" placeholder="A1B1D1O1S1" maxlength="30" value="{{ $specs->pbn ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="crew">Operating Crew</label>
            <input name="crew" type="number" class="form-control" placeholder="6" min="0" max="20" value="{{ $specs->crew ?? '' }}">
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="saircraft">Aircraft or Addon Name</label>
            <input name="saircraft" type="text" class="form-control" placeholder="Zibo B737-800X" maxlength="50" value="{{ $specs->saircraft ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="stitle">Simulator Aircraft Title</label>
            <input name="stitle" type="text" class="form-control" placeholder="Boeing B737-800X" maxlength="30" value="{{ $specs->stitle ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="fuelfactor">Fuel Factor</label>
            <input name="fuelfactor" type="text" class="form-control" placeholder="P05" maxlength="3" value="{{ $specs->fuelfactor ?? '' }}">
          </div>
          <div class="col-sm-2">
            <label class="pl-1 mb-1" for="cruiselevel">Cruise Level Offset</label>
            <input name="cruiselevel" type="text" class="form-control" placeholder="P1000" maxlength="5" value="{{ $specs->cruiselevel ?? '' }}">
          </div>
          <div class="col-sm-3">
            <label class="pl-1 mb-1" for="airframe_id">SimBrief Airframe ID</label>
            <input name="airframe_id" type="text" class="form-control" placeholder="1234_197815072021" maxlength="50" value="{{ $specs->airframe_id ?? '' }}">
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-2 text-left">
            <label class="pl-1 mb-1" for="active">Active <input name="active" type="checkbox" @if($specs && $specs->active == 1) checked="true" @endif class="form-control" value="1"></label>
          </div>
          <div class="col-sm-10 text-right">
            <button class="btn btn-primary pl-1 mb-1" type="submit">@if($specs && $specs->id) Update @else Save @endif</button>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
  <style>
    ::placeholder { color: darkblue !important; opacity: 0.6 !important; }
    :-ms-input-placeholder { color: darkblue !important; }
    ::-ms-input-placeholder { color: darkblue !important; }
  </style>
@endsection
@section('scripts')
  <script type="text/javascript">
    // Simple Selection With Dropdown Change
    // Also keep button hidden until a valid selection
    const $oldlink = document.getElementById("edit_link").href;

    function checkselection() {
      if (document.getElementById("specs_selection").value === "0") {
        document.getElementById('edit_link').style.visibility = 'hidden';
      } else {
        document.getElementById('edit_link').style.visibility = 'visible';
      }
      const selectedspec = document.getElementById("specs_selection").value;
      const newlink = "?editsp=".concat(selectedspec);

      document.getElementById("edit_link").href = $oldlink.concat(newlink);
    }
  </script>
@endsection
