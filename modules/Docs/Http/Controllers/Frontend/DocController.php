<?php

namespace Modules\Docs\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;

class DocController extends Controller
{
    public function charityFleet()
    {
      $flights = Flight::where('airline_id',6)->orderby('flight_time')->get();
      return view('docs::charityevent',['flights' => $flights]);
    }
}