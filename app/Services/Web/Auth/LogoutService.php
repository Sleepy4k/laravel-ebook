<?php

namespace App\Services\Web\Auth;

use App\Services\Service;
use Illuminate\Http\Request;

class LogoutService extends Service
{
    /**
     * Store function.
     * 
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $user = request()->user();

        $properties = [
            'name' => $user->name,
            'username' => $user->username
        ];

        activity('logout')->withProperties($properties)->log($user->username.' berhasil logout');

        auth()->logout();
         
        $session = $request->session();
        $session->invalidate();
        $session->regenerateToken();

        return $session;
    }
}