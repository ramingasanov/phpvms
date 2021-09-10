<?php

namespace Modules\DisposableTools\Widgets;

use App\Contracts\Widget;
use App\Models\Pirep;
use App\Models\Enums\PirepState;

class FlightBoard extends Widget
{
  // Set Widget Auto Refresh Time (Seconds)
  public $reloadTimeout = 60;

  public function run()
  {
    $flights = Pirep::where('state', PirepState::IN_PROGRESS)->orderby('updated_at', 'desc')->get();

    return view('DisposableTools::flight_board',[
      'flights' => $flights,
    ]);
  }
}
