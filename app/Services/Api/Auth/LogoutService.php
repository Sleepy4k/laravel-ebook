<?php

namespace App\Services\Api\Auth;

use App\Http\Resources\UserResource;
use App\Services\ApiService;

class LogoutService extends ApiService
{
    /**
     * Store function.
     * 
     * @param $request
     */
    public function store()
    {
        $user = auth('sanctum')->user();

        request()->user()->currentAccessToken()->delete();

        return $this->createResponse('Logout berhasil', route('api.logout.store'), [
            'data' => new UserResource($user)
        ]);
    }
}