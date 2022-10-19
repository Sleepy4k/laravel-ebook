<?php

namespace App\Services\Api;

use App\Traits\ApiRespons;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\LandingResource;

class LandingService
{
    use ApiRespons;

    /**
     * Get routes function.
     */
    public function getRoutes()
    {
        $routes = [];

        foreach (Route::getRoutes() as $route){
            if (strpos($route->uri, 'api') !== false){
                $routes[] = $route;
            }
        }

        return $routes;
    }

    /**
     * Index function.
     */
    public function index()
    {
        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => LandingResource::collection($this->getRoutes())
            ],
            [
                route('landing.index')
            ]
        );
    }
}