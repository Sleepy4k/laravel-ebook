<?php

namespace App\Services\Api;

use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Index function.
     */
    public function index($url)
    {
        return $this->createResponse('Resource API tidak ditemukan', $url, [
            'data' => 'Route resource tidak ditemukan silahkan hubungi pihak pengembang'
        ], 404);
    }
}