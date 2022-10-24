<?php

namespace App\Services\Api;

use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        return $this->createResponse('Resource API tidak ditemukan', route('api.me.index'), [
            'data' => 'Route resource tidak ditemukan silahkan hubungi pihak pengembang'
        ], 404);
    }
}