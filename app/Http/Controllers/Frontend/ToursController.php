<?php

namespace App\Http\Controllers\Frontend;

use App\Contracts\Controller;

class ToursController extends Controller
{
    /**
     * Show the tours page
     */
    public function index()
    {
        return view('tours');
    }
}