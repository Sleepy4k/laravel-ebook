<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\HomeService;
use App\Http\Controllers\ApiController;

class HomeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HomeService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}