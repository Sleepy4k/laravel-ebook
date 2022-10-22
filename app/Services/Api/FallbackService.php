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
        return $this->createResponse(404, 'Resource API tidak ditemukan',
            [
                'error' => 'Route resource tidak ditemukan silahkan hubungi pihak pengembang'
            ],
            [
                route('api.me.index')
            ]
        );
    }
}