<?php

namespace Modules\Docs\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Pirep;

class DocController extends Controller
{
    public function charityFleet()
    {
      $countOfPireps = Pirep::where('airline_id',6)->where('state',2)->count();
      $flights = Flight::where('airline_id',6)->orderby('flight_time')->get();
      return view('docs::charityevent',['flights' => $flights, 'countOfPireps' => $countOfPireps]);
    }
}