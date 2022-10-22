<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\HomeResource;

class HomeService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new HomeResource($this->userInterface->findById(1))
            ],
            [
                route('api.me.index')
            ]
        );
    }
}