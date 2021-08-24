<?php

namespace Modules\DisposableTools\Widgets;

use App\Contracts\Widget;
use App\Repositories\AirportRepository;

// Widget Designed By MacoFallico, slightly enhanced By FatihKoz
class AirportInfo extends Widget
{
  private $airportRepo;

  protected $config = ['type' => 'all'];

  public function __construct(
    array $config = [],
    AirportRepository $airportRepo
  ) {
    parent::__construct($config);
    $this->airportRepo = $airportRepo;
  }

  public function run()
  {
    $airports = $this->airportRepo->select('id', 'name', 'location', 'country', 'hub')->orderBy('id')->get();

    if($this->config['type'] === 'hubs') {
      $airports = $airports->where('hub', 1);
      if(Dispo_Modules('DisposableHubs')) { $aptroute = 'DisposableHubs.hshow'; }
    }

    if($this->config['type'] === 'nohubs') {
      $airports = $airports->where('hub', 0);
    }

    return view('DisposableTools::airport_info', [
      'airports' => $airports,
      'config'   => $this->config,
      'aptroute' => isset($aptroute) ? $aptroute : 'frontend.airports.show',
    ]);
  }
}
