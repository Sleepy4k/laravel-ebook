<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiRespons;
use App\Services\Api\LandingService;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    use ApiRespons;

    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    private function catchError($error, $route)
    {
        return $this->createResponse(500, 'Server Error',
            [
                'error' => $error->getMessage()
            ],
            [
                $route
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LandingService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th, route('landing.index'));
        }
    }
}
