<?php

namespace App\Widgets;

use App\Models\Pirep;
use App\Contracts\Widget;
use Illuminate\Support\Facades\DB;

class TopPilots extends Widget
{
	protected $config = ['count' => 3, 'type' => 'flights'];
	
	public function run() 
	{	
		$selection = $this->config['type'];
		
		if ($selection === 'flights') { 
			$rawsql = DB::raw('count(user_id) as totals');
		}
		if ($selection === 'distance') { 
			$rawsql = DB::raw('sum(distance) as totals');
		}
		if ($selection === 'time') { 
			$rawsql = DB::raw('sum(flight_time) as totals');
		}

		$tpilots = Pirep::select('user_id', $rawsql)
					->where('state', 2)
					->orderby('totals', 'desc')
					->groupby('user_id')
					->take($this->config['count'])
					->get();

		return view('widgets.toppilots', [
			'tpilots' => $tpilots, 
			'type'    => $selection, 
			'count'   => $this->config['count'],
		]);
	}
}
