<?php

namespace App\Services\Api;

use Illuminate\Http\Request;
use App\Services\ApiService;

class FallbackService extends ApiService
{
    /**
     * Index function.
     */
    public function index(Request $request)
    {
        return $this->createResponse('Resource API tidak ditemukan', $request->url(), [
            'data' => 'Route resource tidak ditemukan silahkan hubungi pihak pengembang'
        ], 404);
    }
}