<?php

namespace Modules\DisposableTech\Http\Controllers;

use App\Contracts\Controller;
use App\Models\Aircraft;
use Modules\DisposableTech\Models\Disposable_Flaps;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TechFlapsController extends Controller
{
  // Admin Flaps Page
  public function dtacflaps(Request $request) {

    //Get Aircraft ICAO List
    
    $flaps = Disposable_Flaps::get();
    $flist = $flaps->pluck('icao')->all();
    $icao = Aircraft::whereNotIn('icao', $flist)->select('icao')->groupby('icao')->orderby('icao')->get();
    $flap = null;

    if($request->input('editflaps')) {
      $flap = Disposable_Flaps::where('id', $request->input('editflaps'))->first();
      if(!$flap)
      {
        Flash::error('Record Not Found !');
        return redirect(route('DisposableTech.techadmin'));
      }
    }

    return view('DisposableTech::admin_acflaps',[
      'icao'  => $icao,
      'flaps' => $flaps,
      'flap'  => $flap,
    ]);
  }

  // Add Flaps
  public function dtstoreflaps(Request $request) {

    if($request->active == 1) {
      $active = 1;
    } else {
      $active = 0;
    }

    if(!$request->icao) {
      Flash::error('ICAO Type Code Is Required !');
      return redirect(route('DisposableTech.techadmin'));
    }

    // Create New Record
    Disposable_Flaps::create([
      'icao'         => $request->icao,
      'f0_name'      => $request->f0_name,
      'f0_speed'     => $request->f0_speed,
      'f1_name'      => $request->f1_name,
      'f1_speed'     => $request->f1_speed,
      'f2_name'      => $request->f2_name,
      'f2_speed'     => $request->f2_speed,
      'f3_name'      => $request->f3_name,
      'f3_speed'     => $request->f3_speed,
      'f4_name'      => $request->f4_name,
      'f4_speed'     => $request->f4_speed,
      'f5_name'      => $request->f5_name,
      'f5_speed'     => $request->f5_speed,
      'f6_name'      => $request->f6_name,
      'f6_speed'     => $request->f6_speed,
      'f7_name'      => $request->f7_name,
      'f7_speed'     => $request->f7_speed,
      'f8_name'      => $request->f8_name,
      'f8_speed'     => $request->f8_speed,
      'f9_name'      => $request->f9_name,
      'f9_speed'     => $request->f9_speed,
      'f10_name'     => $request->f10_name,
      'f10_speed'    => $request->f10_speed,
      'gear_extend'  => $request->gear_extend,
      'gear_retract' => $request->gear_retract,
      'gear_maxtire' => $request->gear_maxtire,
      'active'       => $active,
    ]);

    Flash::success('Flap/Gear Details Recorded');
    return redirect(route('DisposableTech.dtacflaps'));
  }

  // Update Specs
  public function dtupdateflaps(Request $request) {

    if($request->active == 1) {
      $active = 1;
    } else {
      $active = 0;
    }

    if(!$request->edit_icao) {
      Flash::error('ICAO Type Code Is Required !');
      return redirect(route('DisposableTech.techadmin'));
    }

    // Get The Record And Update
    Disposable_Flaps::where('id', $request->id)->update([
      'id'           => $request->id,
      'icao'         => $request->edit_icao,
      'f0_name'      => $request->f0_name,
      'f0_speed'     => $request->f0_speed,
      'f1_name'      => $request->f1_name,
      'f1_speed'     => $request->f1_speed,
      'f2_name'      => $request->f2_name,
      'f2_speed'     => $request->f2_speed,
      'f3_name'      => $request->f3_name,
      'f3_speed'     => $request->f3_speed,
      'f4_name'      => $request->f4_name,
      'f4_speed'     => $request->f4_speed,
      'f5_name'      => $request->f5_name,
      'f5_speed'     => $request->f5_speed,
      'f6_name'      => $request->f6_name,
      'f6_speed'     => $request->f6_speed,
      'f7_name'      => $request->f7_name,
      'f7_speed'     => $request->f7_speed,
      'f8_name'      => $request->f8_name,
      'f8_speed'     => $request->f8_speed,
      'f9_name'      => $request->f9_name,
      'f9_speed'     => $request->f9_speed,
      'f10_name'     => $request->f10_name,
      'f10_speed'    => $request->f10_speed,
      'gear_extend'  => $request->gear_extend,
      'gear_retract' => $request->gear_retract,
      'gear_maxtire' => $request->gear_maxtire,
      'active'       => $active,
    ]);

    Flash::success('Flap/Gear Details Updated');
    return redirect(route('DisposableTech.dtacflaps'));
  }
}
