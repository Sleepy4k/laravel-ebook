<?php

namespace App\Services\Api;

use App\Traits\ApiRespons;

class FallbackService
{
    use ApiRespons;

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
                route('me.index')
            ]
        );
    }
}