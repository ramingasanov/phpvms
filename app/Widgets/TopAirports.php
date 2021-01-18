<?php

namespace App\Widgets;

use App\Models\Pirep;
use App\Contracts\Widget;
use Illuminate\Support\Facades\DB;

class TopAirports extends Widget
{
	protected $config = ['count' => 3, 'type' => 'dep',]; 

	public function run() {

		$selection = $this->config['type'];
		$count = $this->config['count'];

		if ($selection === 'dep')
		{
			$thtext = 'Departures' ;
			$TopAirports = Pirep::select('dpt_airport_id', DB::raw('count(dpt_airport_id) as tusage'))
						->where('state', 2)
						->orderBy('tusage', 'desc')
						->groupBy('dpt_airport_id')
						->take($count)
						->get();

		} elseif ($selection === 'arr') {

			$thtext = 'Arrivals' ;
			$TopAirports = Pirep::select('arr_airport_id', DB::raw('count(arr_airport_id) as tusage'))
						->where('state', 2)
						->orderBy('tusage', 'desc')
						->groupBy('arr_airport_id')
						->take($count)
						->get();
		}

		return view('widgets.topairports', [
			'tairports' => $TopAirports,
			'rtype'		=> $thtext,
			'count'		=> $count,
			]);
	}
}
