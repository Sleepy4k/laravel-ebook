<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Web\Auth\LogoutService;

class LogoutController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LogoutService $service)
    {
        $service->store($request);

        return redirect(route("landing"));
    }
}
