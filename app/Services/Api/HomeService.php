<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\UserResource;

class HomeService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        return $this->createResponse('Data berhasil diterima', route('api.me.index'), [
            'data' => new UserResource($this->userInterface->findById(1))
        ], 202);
    }
}