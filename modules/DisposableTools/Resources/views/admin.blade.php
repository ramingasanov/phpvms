@extends('admin.app')
@section('title', 'Disposable Tools and Widgets Module')

@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      <p>This module is designed to provide multiple widgets and some helper tools for phpVms with basic language support.</p>
      <p><b>Widget list, possible options and usage examples are in the README.md file</b></p>
      <p>&bull; <a href="https://github.com/FatihKoz/DisposableTools#readme" target="_blank">Online Readme</a></p>
      <hr>
      <p>By <a href="https://github.com/FatihKoz" target="_blank">B.Fatih KOZ</a> &copy; @php echo date('Y'); @endphp</p>
    </div>
  </div>

  <div class="row text-center" style="margin-left:5px; margin-right:5px;">
    <div class="col-sm-12">
      <h5 style="margin:5px; padding:5px;"><b>Admin Functions & Settings</b></h5>
    </div>
  </div>

  <div class="row text-center" style="margin-left:5px; margin-right:5px;">
    <div class="col-sm-4">
      <div class="card border-blue-bottom" style="padding:10px;">
        <b>IVAO WhazzUp Widget Settings</b>
        <br><br>
        <form action="/admin/disposabletools" id="whazzupivao">
          <input type="hidden" name="action" value="whazzup">
          <input type="hidden" name="network" value="IVAO">
          <div class="row text-center">
            <div class="col-sm-12">
              <label for="field_name">IVAO ID Field Name</label>
              <input class="form-control" type="text" id="field_name" name="field_name" placeholder="IVAO" maxlength="20" value="{{ Dispo_Settings('dtools.whazzup_ivao_fieldname') }}">
            </div>
          </div>
          <div class="row text-center">
            <div class="col-sm-12">
              <label for="refresh_interval">Refresh Interval (seconds)</label>
              <input class="form-control" type="number" id="refresh_interval" name="refresh_interval" placeholder="60" min="15" max="1200" value="{{ Dispo_Settings('dtools.whazzup_ivao_refresh') }}">
            </div>
          </div>
          <input type="submit" value="Save Widget Settings">
        </form>
        <br>
        <span class="text-danger"><b>Defaults are IVAO and 60 seconds</b></span>
      </div>
    </div>

    <div class="col-sm-4">   
      <div class="card border-blue-bottom" style="padding:10px;">
        <b>VATSIM WhazzUp Widget Settings</b>
        <br><br>
        <form action="/admin/disposabletools" id="whazzupvatsim">
          <input type="hidden" name="action" value="whazzup">
          <input type="hidden" name="network" value="VATSIM">
          <div class="row text-center">
            <div class="col-sm-12">
              <label for="field_name">VATSIM CID Field Name</label>
              <input class="form-control" type="text" id="field_name" name="field_name" placeholder="VATSIM" maxlength="20" value="{{ Dispo_Settings('dtools.whazzup_vatsim_fieldname') }}">
            </div>
          </div>
          <div class="row text-center">
            <div class="col-sm-12">
              <label for="refresh_interval">Refresh Interval (seconds)</label>
              <input class="form-control" type="number" id="refresh_interval" name="refresh_interval" placeholder="60" min="15" max="1200" value="{{ Dispo_Settings('dtools.whazzup_vatsim_refresh') }}">
            </div>
          </div>
          <input type="submit" value="Save Widget Settings">
        </form>
        <br>
        <span class="text-danger"><b>Defaults are VATSIM and 60 seconds</b></span>
      </div>
    </div>

    <div class="col-sm-4">   
      <div class="card border-blue-bottom" style="padding:10px;">
        <a href="/admin/dispodbcheck" target="_blank"><b>Check Database for Possible Errors</b></a>
        <br>
      </div>
    </div>
  </div>
@endsection
