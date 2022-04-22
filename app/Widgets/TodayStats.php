<?php

namespace App\Widgets;

use Carbon;
use App\Contracts\Widget;
use App\Models\Flight;
use App\Models\User;
use App\Models\Enums\PirepState;
use App\Repositories\PirepRepository;
use Illuminate\Support\Facades\DB;

class TodayStats extends Widget
{
	protected $config = ['type' => 'totalPireps',];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function run()
    {
        $selection = $this->config['type'];
        $pirepRepo = app(PirepRepository::class);
        if ($selection === 'totalPireps') {
            $value = $pirepRepo
            ->whereDate('created_at',\Carbon\Carbon::today())
            ->whereNotIn('state', [
                PirepState::CANCELLED,
                PirepState::DRAFT,
                PirepState::IN_PROGRESS,
                PirepState::REJECTED,
            ])
            ->count();
        } else if ($selection === 'totalHours') {
            $value = $pirepRepo
            ->whereDate('created_at',\Carbon\Carbon::today())
            ->whereNotIn('state', [
                PirepState::CANCELLED,
                PirepState::DRAFT,
                PirepState::IN_PROGRESS,
                PirepState::REJECTED,
            ])
            ->sum('flight_time');
        } else if ($selection === 'totalPilots') {
            $value = User::count();
        } else if ($selection === 'totalFlights') {
            $value = Flight::count();
        } else if ($selection === 'totalSchedules') {
            // TODO
            $value = 0;
        }

        return view('widgets.todayStats', [
            'type' => $selection,
            'value' => $value
        ]);
    }
}
