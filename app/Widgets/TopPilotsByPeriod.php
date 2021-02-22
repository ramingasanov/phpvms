<?php

namespace App\Widgets;

use App\Models\Pirep;
use App\Contracts\Widget;
use Illuminate\Support\Facades\DB;

class TopPilotsByPeriod extends Widget
{
    protected $config = ['count' => 3, 'type' => 'flights', 'period' => 'currentm'];

    public function run()
    {
        $periodselection = $this->config['period'];
        $wheretype = 'whereMonth';
        $conditionA = '';
        $conditionB = '';
        $conditionC = '';

        if ($periodselection == 'currentm')
        {
            $repdate = \Carbon\Carbon::now();
            $repsql = \Carbon\Carbon::now()->month;
            $period = $repdate->format('F');
        }

        if ($periodselection == 'lastm')
        {
            $repdate = \Carbon\Carbon::now()->subMonth();
            $repsql = \Carbon\Carbon::now()->subMonth()->month;
            $period = $repdate->format('F');
        }

        if ($periodselection == 'prevm')
        {
            $repdate = \Carbon\Carbon::now()->subMonth(2);
            $repsql = \Carbon\Carbon::now()->subMonth(2)->month;
            $period = $repdate->format('F');
        }

        if ($periodselection == 'currenty')
        {
            $wheretype = 'whereYear';
            $repdate = \Carbon\Carbon::now();
            $repsql = \Carbon\Carbon::now()->year;
            $period =  $repdate->format('Y');
        }

        if ($periodselection == 'lasty')
        {
            $wheretype = 'whereYear';
            $repdate = \Carbon\Carbon::now()->subYear();
            $repsql = \Carbon\Carbon::now()->subYear()->year;
            $period =  $repdate->format('Y');
        }

        $selection = $this->config['type'];

        if ($selection == 'flights') 
        { 
            $rawsql = DB::raw('count(user_id) as totals');
        }
        if ($selection == 'distance')
        { 
            $rawsql = DB::raw('sum(distance) as totals');
        }
        if ($selection == 'time')
        { 
            $rawsql = DB::raw('sum(flight_time) as totals');
        }
        if($selection === 'average landing rate') {
			$rawsql = DB::raw('avg(landing_rate) as totals');
            $conditionA = 'landing_rate';
            $conditionB = '<';
            $conditionC = -10;
		}
        if ($conditionA && $conditionB && $conditionC) {
            $tpilots = Pirep::select('user_id', $rawsql)
            ->where('state', '2')
            ->where($conditionA, $conditionB, $conditionC)
            ->$wheretype('created_at', '=', $repsql)
            ->orderBy('totals', 'desc')
            ->groupBy('user_id')
            ->havingRaw('count(*) >', [1])
            ->take($this->config['count'])
            ->get();
        } else {
            $tpilots = Pirep::select('user_id', $rawsql)
            ->where('state', '2')
            ->$wheretype('created_at', '=', $repsql)
            ->orderBy('totals', 'desc')
            ->groupBy('user_id')
            ->take($this->config['count'])
            ->get();
        }


        return view('widgets.toppilotsbyperiod', [
            'tpilots' => $tpilots,
            'type'    => $selection,
            'count'   => $this->config['count'],
            'rperiod' => $period,
            ]);
    }
}
