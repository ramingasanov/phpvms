<?php

namespace Modules\DisposableTools\Widgets;

use App\Contracts\Widget;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\DisposableTools\Models\Disposable_RandomFlight;
use Carbon;

class RandomFlight extends Widget
{
  protected $config = ['count' => null, 'daily' => false, 'hub' => false];

  public function run()
  {
    $count = is_numeric($this->config['count']) ? $this->config['count'] : 1;
    $today = Carbon::today();
    $user = Auth::user();

    // Failsafe
    if (!$user) { return null; }

    // Clean Out Old Entries
    Disposable_RandomFlight::where('assign_date', '!=', $today)->delete();

    // Get User Location
    if ($this->config['hub'] === true) {
      $orig = $user->home_airport_id;
    } else {
      $orig = filled($user->curr_airport_id) ? $user->curr_airport_id : $user->home_airport_id;
    }

    // Pick Flights & Save
    $rfs = Disposable_RandomFlight::where('user_id', $user->id)->where('assign_date', $today)->get();
    if ($this->config['daily'] === true && $rfs->isEmpty()) {
      $this->PickRandomFlights($user, $orig, $count);
    }
    elseif ($this->config['daily'] === false && $rfs->where('airport_id', $orig)->count() === 0) {
      $this->PickRandomFlights($user, $orig, $count);
    }

    // Get Flights and Return
    $random_flights = Disposable_RandomFlight::where('user_id', $user->id)->where('assign_date', $today)->get();
    return view('DisposableTools::random_flight',[
      'random_flights' => $random_flights
    ]);
  }

  public function PickRandomFlights($user, $orig, $count)
  {
    // Get Flights
    $flights = Flight::where(['dpt_airport_id' => $orig, 'active' => 1, 'visible' => 1])->get();

    // Apply phpVMS Settings
    if (setting('pilots.restrict_to_company')) {
      $flights = $flights->where('airline_id', $user->airline_id);
    }

    if (setting('pireps.restrict_aircraft_to_rank')) {
      $allowed_subfleets = $user->rank->subfleets()->pluck('id')->toArray();
      $allowed_flights = DB::table('flight_subfleet')->whereIn('subfleet_id', $allowed_subfleets)->pluck('flight_id')->toArray();
      $flights = $flights->whereIn('id', $allowed_flights);
    }

    // Eliminate Already Flown
    $flown = DB::table('pireps')->where(['user_id' => $user->id, 'dpt_airport_id' => $orig, 'state' => 2])->groupby('flight_id')->pluck('flight_id')->toArray();
    if (count($flights) > count($flown)) {
      $flights = $flights->whereNotIn('id', $flown);
    }

    // Get Random Flights with Failsafe
    $flights = $flights->pluck('id');
    if ($flights->count() < $count) { $count = $flights->count(); }
    $flights = $flights->random($count);

    // Save
    $this->SaveRandomFlights($flights, $user->id, $orig);
  }

  public function SaveRandomFlights($flights, $user_id, $orig)
  {
    // Save each flight
    foreach ($flights as $flight) {
      Disposable_RandomFlight::create([
        'user_id'     => $user_id,
        'airport_id'  => $orig,
        'flight_id'   => $flight,
        'assign_date' => Carbon::today(),
      ]);
    }
  }
}
