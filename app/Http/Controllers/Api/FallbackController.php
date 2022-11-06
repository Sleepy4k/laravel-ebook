<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Api\FallbackService;
use App\Http\Controllers\ApiController;

class FallbackController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FallbackService $service, Request $request)
    {
        try {
            return $service->index($request->url());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}