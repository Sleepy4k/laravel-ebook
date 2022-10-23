<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Services\Web\Auth\LoginService;
use App\Http\Requests\Web\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request, LoginService $service)
    {
        if ($service->store($request->validated())) {
            return redirect(route('dashboard.index'));
        } else {
            return back();
        }
    }
}
