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
        return $this->createResponse('Data berhasil diterima', route('api.me.index'), [
            'data' => new HomeResource($this->userInterface->findById(1))
        ], 202);
    }
}