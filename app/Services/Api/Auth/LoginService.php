<?php

namespace App\Services\Api\Auth;

use App\Services\ApiService;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class LoginService extends ApiService
{
    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $user = $this->userInterface->findByCustomId([['username', $request['username']]]);

        if (!$user || !Hash::check($request['password'], $user->password)) {
            $this->createResponse('Authentikasi Gagal', route('api.login.store'), [
                'error' => 'Proses authentikasi gagal silahkan coba lagi'
            ], 401);
        }

        $token = $user->createToken(fake()->name);

        return $this->createResponse('Authentikasi berhasil', route('api.login.store'), [
            'data' => [
                'user' => new UserResource($user),
                'token' => $token->plainTextToken
            ]
        ], 201);
    }
}