<?php

namespace App\Services\Web\Auth;

use App\Services\WebService;

class LoginService extends WebService
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
                'name' => $user->name,
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