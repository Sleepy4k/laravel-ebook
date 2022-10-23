<?php

namespace App\Services\Web\Auth;

use App\Services\Service;

class LoginService extends Service
{
    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        if (auth()->attempt($request)) {
            request()->session()->regenerate();

            $user = request()->user();
            
            $properties = [
                'nama' => $user->nama,
                'username' => $user->username
            ];

            activity('login')->withProperties($properties)->log($user->username.' berhasil login');
            toastr()->success('Kamu berhasil login', 'System');

            return true;
        } else {
            return false;
        }
    }
}