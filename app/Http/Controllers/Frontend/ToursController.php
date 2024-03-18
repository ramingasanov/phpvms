<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;
use App\Models\Bid;
use App\Models\Enums\FlightType;
use App\Models\Flight;
use App\Repositories\AirlineRepository;
use App\Repositories\AirportRepository;
use App\Repositories\Criteria\WhereCriteria;
use App\Repositories\FlightRepository;
use App\Repositories\SubfleetRepository;
use App\Repositories\UserRepository;
use App\Services\GeoService;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;
use App\Services\UserService;
use App\Models\Enums\AircraftState;
use App\Models\Enums\AircraftStatus;
use App\Models\Aircraft;

class ToursController extends Controller
{
    /**
     * Show the tours page
     */

    private AirlineRepository $airlineRepo;
    private AirportRepository $airportRepo;
    private FlightRepository $flightRepo;
    private ModuleService $moduleSvc;
    private SubfleetRepository $subfleetRepo;
    private GeoService $geoSvc;
    private UserRepository $userRepo;
    private UserService $userSvc;

    public function __construct(
         AirlineRepository $airlineRepo,
        AirportRepository $airportRepo,
        FlightRepository $flightRepo,
        GeoService $geoSvc,
        ModuleService $moduleSvc,
        SubfleetRepository $subfleetRepo,
        UserRepository $userRepo,
        UserService $userSvc
    ) {
        $this->airlineRepo = $airlineRepo;
        $this->airportRepo = $airportRepo;
        $this->flightRepo = $flightRepo;
        $this->geoSvc = $geoSvc;
        $this->moduleSvc = $moduleSvc;
        $this->subfleetRepo = $subfleetRepo;
        $this->userRepo = $userRepo;
        $this->userSvc = $userSvc;
    }

    public function index(Request $request)
    {
        $where = [
            'active'  => true,
            'visible' => true,
        ];

        /** @var User $user */

        $where['airline_id'] = 29;

        // default restrictions on the flights shown. Handle search differently

        $this->flightRepo->resetCriteria();

        try {
            $this->flightRepo->searchCriteria($request);
            $this->flightRepo->pushCriteria(new WhereCriteria($request, $where, [
                'airline' => ['active' => true],
            ]));

            $this->flightRepo->pushCriteria(new RequestCriteria($request));
        } catch (RepositoryException $e) {
            Log::emergency($e);
        }

        // Get only used Flight Types for the search form
        // And filter according to settings
        $usedtypes = Flight::select('flight_type')
            ->where($where)
            ->groupby('flight_type')
            ->orderby('flight_type')
            ->get();

        // Build collection with type codes and labels
        $flight_types = collect('', '');
        foreach ($usedtypes as $ftype) {
            $flight_types->put($ftype->flight_type, FlightType::label($ftype->flight_type));
        }

        $all_flights = $this->flightRepo->searchCriteria($request)
            ->with([
                'airline',
                'alt_airport',
                'arr_airport',
                'dpt_airport',
                'subfleets.airline' ])
            ->orderBy('flight_number')
            ->orderBy('route_leg');

        $flights = $all_flights->paginate();

        return view('tours', [
            'airlines'      => $this->airlineRepo->selectBoxList(true),
            'airports'      => $this->airportRepo->selectBoxList(true),
            'flights'       => $flights,
            'subfleets'     => $this->subfleetRepo->selectBoxList(true),
            'flight_number' => $request->input('flight_number'),
            'flight_types'  => $flight_types,
            'flight_type'   => $request->input('flight_type'),
            'arr_icao'      => $request->input('arr_icao'),
            'dep_icao'      => $request->input('dep_icao'),
            'subfleet_id'   => $request->input('subfleet_id'),
            'simbrief'      => !empty(setting('simbrief.api_key')),
            'simbrief_bids' => setting('simbrief.only_bids'),
            'min_duration'  => $all_flights->min('flight_time'),
            'max_duration'  => $all_flights->max('flight_time'),
            'count_flights' => $all_flights->count(),
            'acars_plugin'  => $this->moduleSvc->isModuleActive('VMSAcars'),
        ]);
    }

    public function touraircraft(Request $request, $id)
    {
        $where = [
            'active'  => true,
            'visible' => true,
            'id' => $id
        ];

        /** @var User $user */

        $where['airline_id'] = 29;

        // default restrictions on the flights shown. Handle search differently

        $this->flightRepo->resetCriteria();

        try {
            $this->flightRepo->searchCriteria($request);
            $this->flightRepo->pushCriteria(new WhereCriteria($request, $where, [
                'airline' => ['active' => true],
            ]));

            $this->flightRepo->pushCriteria(new RequestCriteria($request));
        } catch (RepositoryException $e) {
            Log::emergency($e);
        }

        // Get only used Flight Types for the search form
        // And filter according to settings
        $usedtypes = Flight::select('flight_type')
            ->where($where)
            ->groupby('flight_type')
            ->orderby('flight_type')
            ->get();

        // Build collection with type codes and labels
        $flight_types = collect('', '');
        foreach ($usedtypes as $ftype) {
            $flight_types->put($ftype->flight_type, FlightType::label($ftype->flight_type));
        }

        $all_flights = $this->flightRepo->searchCriteria($request)
            ->with([
                'airline',
                'alt_airport',
                'arr_airport',
                'dpt_airport',
                'subfleets.airline' ])
            ->orderBy('flight_number')
            ->orderBy('route_leg');

        $flights = $all_flights->paginate();

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $flight_id = $id;
        $aircraft_id = $request->input('aircraft_id');

        /** @var Flight $flight */
        $flight = $this->flightRepo->with(['airline', 'arr_airport', 'dpt_airport', 'fares', 'subfleets'])->find($flight_id);

        if (!$flight) {
            flash()->error('Unknown flight');
            return redirect(route('frontend.flights.index'));
        }

        $apiKey = setting('simbrief.api_key');
        if (empty($apiKey)) {
            flash()->error('Invalid SimBrief API key!');
            return redirect(route('frontend.flights.index'));
        }

        // Generate SimBrief Static ID
        $static_id = $user->ident.'_'.$flight->id;

        // No aircraft selected, show selection form
        if (!$aircraft_id) {

            // Get user's allowed subfleets and intersect it with flight subfleets
            // so we will have a proper list which the user is allowed to fly
            $user_subfleets = $this->userSvc->getAllowableSubfleets($user)->pluck('id')->toArray();
            $flight_subfleets = $flight->subfleets->pluck('id')->toArray();

            $subfleet_ids = filled($flight_subfleets) ? array_intersect($user_subfleets, $flight_subfleets) : $user_subfleets;

            // Prepare variables for single aircraft query
            $where = [];
            $where['state'] = AircraftState::PARKED;
            $where['status'] = AircraftStatus::ACTIVE;

            if (setting('pireps.only_aircraft_at_dpt_airport')) {
                $where['airport_id'] = $flight->dpt_airport_id;
            }

            $withCount = ['simbriefs' => function ($query) {
                $query->whereNull('pirep_id');
            }];

            // Build proper aircraft collection considering all possible settings
            // Flight subfleets, user subfleet restrictions, pirep restrictions, simbrief blocking etc
            $aircraft = Aircraft::withCount($withCount)->where($where)
                ->when(setting('simbrief.block_aircraft'), function ($query) {
                    return $query->having('simbriefs_count', 0);
                })->whereIn('subfleet_id', $subfleet_ids)
                ->orderby('icao')->orderby('registration')
                ->get();
        }

        return view('tour-aircraft', [
            'aircrafts' => $aircraft,
            'airlines'      => $this->airlineRepo->selectBoxList(true),
            'airports'      => $this->airportRepo->selectBoxList(true),
            'flights'       => $flights,
            'subfleets'     => $this->subfleetRepo->selectBoxList(true),
            'flight_number' => $request->input('flight_number'),
            'flight_types'  => $flight_types,
            'flight_type'   => $request->input('flight_type'),
            'arr_icao'      => $request->input('arr_icao'),
            'dep_icao'      => $request->input('dep_icao'),
            'subfleet_id'   => $request->input('subfleet_id'),
            'simbrief'      => !empty(setting('simbrief.api_key')),
            'simbrief_bids' => setting('simbrief.only_bids'),
            'min_duration'  => $all_flights->min('flight_time'),
            'max_duration'  => $all_flights->max('flight_time'),
            'count_flights' => $all_flights->count(),
            'acars_plugin'  => $this->moduleSvc->isModuleActive('VMSAcars'),
        ]);
    }
}
