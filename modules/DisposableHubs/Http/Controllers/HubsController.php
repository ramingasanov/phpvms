<?php

namespace Modules\DisposableHubs\Http\Controllers;

use App\Contracts\Controller;
use App\Repositories\AircraftRepository;
use App\Repositories\AirportRepository;
use App\Repositories\FlightRepository;
use App\Repositories\SubfleetRepository;
use App\Repositories\UserRepository;
use League\ISO3166\ISO3166;
use Nwidart\Modules\Facades\Module;

class HubsController extends Controller
{
    private $airportRepo;
    private $aircraftRepo;
    private $flightRepo;
    private $subfleetRepo;
    private $userRepo;

    public function __construct(
        AircraftRepository $aircraftRepo,
        AirportRepository $airportRepo,
        FlightRepository $flightRepo,
        SubfleetRepository $subfleetRepo,
        UserRepository $userRepo
    ) {
        $this->aircraftRepo = $aircraftRepo;
        $this->airportRepo = $airportRepo;
        $this->flightRepo = $flightRepo;
        $this->subfleetRepo = $subfleetRepo;
        $this->userRepo = $userRepo;
    }
    // Hubs
    // List all Hubs
    // Return collection
    public function hubs()
    {
        $hubs = $this->airportRepo->where('hub',1)->get();

        if(!$hubs) {
            flash()->error('No Hubs Found !');
            return redirect(route('frontend.dashboard.index'));
        }

        return view('DisposableHubs::index', [
            'hubs'    => $hubs,
            'country' => new ISO3166(),
            ]
        );
    }
    // Hub
    // Details of selected Hub
    // Return mixed
    public function show($id)
    {
        $hub = $this->airportRepo->where('id', $id)->where('hub',1)->first();

        if(!$hub) {
            flash()->error('Airport Is Not Hub !');
            return redirect(route('DisposableHubs.hindex'));
        }

        if($hub) {
            $DisposableTools = Module::has('DisposableTools');
            $hubfleets = $this->subfleetRepo->where('hub_id', $hub->id)->select('id')->get();
            $hubfleets = $hubfleets->map->only(['id'])->all();
            $haircrafts = $this->aircraftRepo->whereIn('subfleet_id', $hubfleets)->get();
            $vaircrafts = $this->aircraftRepo->whereNotIn('subfleet_id', $hubfleets)->where('airport_id', $hub->id)->get();
            $hpilots = $this->userRepo->where('home_airport_id', $hub->id)->get();
            $vpilots = $this->userRepo->where('curr_airport_id', $hub->id)->where('home_airport_id', '!=', $hub->id)->get();
            $deps = $this->flightRepo->where('dpt_airport_id', $hub->id)->where('active', 1)->where('visible',1)->get();
            $arrs = $this->flightRepo->where('arr_airport_id', $hub->id)->where('active', 1)->where('visible',1)->get();

          return view('DisposableHubs::show', [
              'disptools'  => $DisposableTools,
              'hub'        => $hub,
              'country'    => new ISO3166(),
              'hpilots'    => $hpilots,
              'vpilots'    => $vpilots,
              'haircrafts' => $haircrafts,
              'vaircrafts' => $vaircrafts,
              'deps'       => $deps,
              'arrs'       => $arrs,
          ]);
        }
    }
}
