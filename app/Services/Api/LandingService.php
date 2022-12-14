<?php

namespace App\Services\Api;

use App\Services\ApiService;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\LandingResource;

class LandingService extends ApiService
{
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
        return $this->createResponse('Data berhasil diterima', route('api.landing.index'), [
            'data' => LandingResource::collection($this->getRoutes())
        ], 202);
    }
}