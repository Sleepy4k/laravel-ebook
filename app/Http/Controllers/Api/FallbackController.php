<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\FallbackService;
use App\Http\Controllers\ApiController;

class FallbackController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FallbackService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.landing.index'));
        }
    }
}