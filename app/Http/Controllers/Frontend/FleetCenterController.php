<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;

class FleetCenterController extends Controller
{
    /**
     * Show the fleet center page
     */
    public function index()
    {
        return view('fleet-center');
    }
}