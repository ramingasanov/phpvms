<?php

namespace Modules\DisposableHubs\Http\Controllers;

use App\Contracts\Controller;
use App\Repositories\AircraftRepository;
use App\Repositories\AirlineRepository;
use App\Repositories\AirportRepository;
use App\Repositories\FlightRepository;
use App\Repositories\PirepRepository;
use App\Repositories\SubfleetRepository;
use App\Repositories\UserRepository;
use Nwidart\Modules\Facades\Module;

class StatsController extends Controller
{
    private $aircraftRepo;
    private $airlineRepo;
    private $airportRepo;
    private $flightRepo;
    private $pirepRepo;
    private $subfleetRepo;
    private $userRepo;

    public function __construct(
        AircraftRepository $aircraftRepo,
        AirlineRepository $airlineRepo,
        AirportRepository $airportRepo,
        FlightRepository $flightRepo,
        PirepRepository $pirepRepo,
        SubfleetRepository $subfleetRepo,
        UserRepository $userRepo
    ) {
        $this->aircraftRepo = $aircraftRepo;
        $this->airlineRepo = $airlineRepo;
        $this->airportRepo = $airportRepo;
        $this->flightRepo = $flightRepo;
        $this->pirepRepo = $pirepRepo;
        $this->subfleetRepo = $subfleetRepo;
        $this->userRepo = $userRepo;
    }
    // Stats
    // Return Multiple Strings
    public function stats()
    {
        $DisposableTools = Module::find('DisposableTools');
        if($DisposableTools) {
          $DisposableTools = $DisposableTools->isEnabled();
        }

        $TotalAirlines = $this->airlineRepo->count();
        $TotalinactiveAirlines = $this->airlineRepo->where('active', '!=', '1')->count();

        $TotalSubFleets = $this->subfleetRepo->count();
        $TotalAircrafts = $this->aircraftRepo->where('status', 'A')->count();
        $TotalinactiveAircrafts = $this->aircraftRepo->where('status', '!=', 'A')->count();

        $TotalPilots = $this->userRepo->where('state', '1')->count();
        $TotalinactivePilots = $this->userRepo->where('state', '!=', '1')->count();

        $TotalAirports = $this->airportRepo->count();
        $TotalHubs = $this->airportRepo->where('hub', '1')->count();
        $TotalFlights = $this->flightRepo->count();

        $TotalPireps = $this->pirepRepo->where('state', '2')->count();
        $TotalRejectedPireps = $this->pirepRepo->where('state', '6')->count();
        $TotalFlightTime = $this->pirepRepo->where('state', '2')->sum('flight_time');
        $TotalFuelUsed = $this->pirepRepo->where('state', '2')->sum('fuel_used');
        $TotalDistanceFlown = $this->pirepRepo->where('state', '2')->sum('distance');
        $AvgLandingRate = $this->pirepRepo->where('state', '2')->where('source', '1')->avg('landing_rate');
        $AvgScore = $this->pirepRepo->where('state', '2')->where('source', '1')->avg('score');

        if($TotalPireps === 0) {
            $AvgFuelUsed = 0;
            $AvgFuelHour = 0;
            $AvgDistance = 0;
            $AvgFlightTime = 0;
        } else {
            $AvgFuelUsed = $TotalFuelUsed / $TotalPireps;
            $AvgFuelHour = ( $TotalFuelUsed / $TotalFlightTime ) * 60;
            $AvgDistance = $TotalDistanceFlown / $TotalPireps;
            $AvgFlightTime = $TotalFlightTime / $TotalPireps;
        }

        if(setting('units.fuel') === 'kg') {
            $TotalFuelUsed = $TotalFuelUsed / 2.20462262185;
            $AvgFuelUsed = $AvgFuelUsed / 2.20462262185;
            $AvgFuelHour = $AvgFuelHour / 2.20462262185;
        }

        if(setting('units.distance') === 'km') {
            $TotalDistanceFlown = $TotalDistanceFlown * 1.852;
            $AvgDistance = $AvgDistance * 1.852;
        } elseif (setting('units.distance') === 'mi') {
            $TotalDistanceFlown = $TotalDistanceFlown * 1.15078;
            $AvgDistance = $AvgDistance * 1.15078;
        }

        return view('DisposableHubs::stats',[
            'disptools'              => $DisposableTools,
            'TotalAirlines'          => $TotalAirlines,
            'TotalinactiveAirlines'  => $TotalinactiveAirlines,
            'TotalSubFleets'         => $TotalSubFleets,
            'TotalAircrafts'         => $TotalAircrafts,
            'TotalinactiveAircrafts' => $TotalinactiveAircrafts,
            'TotalPilots'            => $TotalPilots,
            'TotalinactivePilots'    => $TotalinactivePilots,
            'TotalAirports'          => $TotalAirports,
            'TotalHubs'              => $TotalHubs,
            'TotalFlights'           => $TotalFlights,
            'TotalPireps'            => $TotalPireps,
            'TotalRejectedPireps'    => $TotalRejectedPireps,
            'TotalFlightTime'        => $TotalFlightTime,
            'TotalFuelUsed'          => $TotalFuelUsed,
            'TotalDistanceFlown'     => $TotalDistanceFlown,
            'AvgFlightTime'          => $AvgFlightTime,
            'AvgFuelUsed'            => $AvgFuelUsed,
            'AvgFuelHour'            => $AvgFuelHour,
            'AvgDistance'            => $AvgDistance,
            'AvgLandingRate'         => $AvgLandingRate,
            'AvgScore'               => $AvgScore,
        ]);
    }
}
