<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\DashboardService;
use App\Http\Controllers\WebController;

class DashboardController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        try {
            return view('pages.dashboard.main', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
