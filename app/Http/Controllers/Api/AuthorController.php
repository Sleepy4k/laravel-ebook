<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\AuthorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthorService $service)
    {
        return $service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, AuthorService $service)
    {
        return $service->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorService $service, $id)
    {
        return $service->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, AuthorService $service, $id)
    {
        return $service->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorService $service, $id)
    {
        return $service->destroy($id);
    }
}
