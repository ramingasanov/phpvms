<?php

namespace Modules\DisposableTools\Widgets;

use App\Contracts\Widget;
use App\Models\Pirep;
use App\Models\User;
use App\Models\Enums\PirepState;
use App\Models\Enums\UserState;
use Illuminate\Support\Facades\DB;
use Carbon;
use Lang;

class TopPilots extends Widget
{
  protected $config = ['count' => 3, 'type' => 'flights', 'period' => null, 'hub' => null];

  public function run()
  {

    $period = null;
    $user_states = array(UserState::ACTIVE, UserState::ON_LEAVE);

    // Build Pilot IDs Array
    if ($this->config['hub']) {
      $pilots_array = User::where('home_airport_id', $this->config['hub'])->whereIn('state', $user_states)->pluck('id');
    } else {
      $pilots_array = User::whereIn('state', $user_states)->pluck('id');
    }
    
    if($this->config['period'])
    {
      $wheretype = 'whereMonth';
      $repdate = Carbon::now();

      if ($this->config['period'] === 'currentm')
      {
        $repsql = $repdate->month;
        $period = $repdate->format('F');
      }

      elseif ($this->config['period'] === 'lastm')
      {
        $repdate = $repdate->subMonthNoOverflow();
        $repsql = $repdate->month;
        $period = $repdate->format('F');
      }

      elseif ($this->config['period'] === 'prevm')
      {
        $repdate = $repdate->subMonthNoOverflow(2);
        $repsql = $repdate->month;
        $period = $repdate->format('F');
      }

      elseif ($this->config['period'] === 'currenty')
      {
        $wheretype = 'whereYear';
        $repsql = $repdate->year;
        $period = $repdate->format('Y');
      }

      elseif ($this->config['period'] === 'lasty')
      {
        $wheretype = 'whereYear';
        $repdate = $repdate->subYearNoOverflow();
        $repsql = $repdate->year;
        $period = $repdate->format('Y');
      }
    }

    if ($this->config['type'] === 'flights')
    {
      $rawsql = DB::raw('count(user_id) as totals');
      $rtype = trans_choice('common.flight',2);
    }
    elseif ($this->config['type'] === 'distance')
    {
      $rawsql = DB::raw('sum(distance) as totals');
      $rtype = Lang::get('common.distance');
    }
    elseif ($this->config['type'] === 'time')
    {
      $rawsql = DB::raw('sum(flight_time) as totals');
      $rtype = Lang::get('pireps.flighttime');
    }
    elseif ($this->config['type'] === 'landingrate')
    {
      $rawsql = DB::raw('avg(landing_rate) as totals');
      $rtype = Lang::get('DisposableTools::common.landingrate');
    }

    if ($this->config['period'])
    {
      $tpilots = Pirep::select('user_id', $rawsql)
        ->whereIn('user_id', $pilots_array)
        ->where('state', PirepState::ACCEPTED)
        ->$wheretype('created_at', '=', $repsql)
        ->orderBy('totals', 'desc')
        ->groupBy('user_id')
        ->take($this->config['count'])
        ->get();
    } else {
      $tpilots = Pirep::select('user_id', $rawsql)
        ->whereIn('user_id', $pilots_array)
        ->where('state', PirepState::ACCEPTED)
        ->orderBy('totals', 'desc')
        ->groupBy('user_id')
        ->take($this->config['count'])
        ->get();
    }

    return view('DisposableTools::top_pilots', [
        'tpilots' => $tpilots,
        'config'  => $this->config,
        'rtype'   => $rtype,
        'rperiod' => $period,
        ]);
  }
}
