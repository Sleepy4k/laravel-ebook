<?php

namespace App\Services\Web\Auth;

use App\Services\Service;

class RegisterService extends Service
{
    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $this->userInterface->create($request);

        if (array_key_exists('password', $request)) {
            unset($request['password']);
        }

        activity('register')->withProperties($request)->log($request['username'].' berhasil di daftarkan');

        return true;
    }
}