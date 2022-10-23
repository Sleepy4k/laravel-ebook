<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\DashboardService;

class DashboardController extends Controller
{
    /**
     * Locate blade file
     *
     * @return string
     */
    private static $path = 'pages.dashboard.main';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        return view(static::$path, $service->index());
    }
}
