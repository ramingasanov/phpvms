<?php

namespace Modules\Tours\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Pirep;

class TourController extends Controller
{
    public function getTours(Request $request)
    {
      $flights = Flight::where('airline_id',3)->where('route_code', $request->query('tour'))->orderby('route_leg')->get();
      return view('tours::tours',['flights' => $flights]);
    }
}