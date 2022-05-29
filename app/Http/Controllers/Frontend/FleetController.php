<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;

class FleetController extends Controller
{
    /**
     * Show the fleet page
     */
    public function index()
    {
        return view('fleet');
    }
}