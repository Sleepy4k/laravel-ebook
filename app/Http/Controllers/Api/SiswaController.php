<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\SiswaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\StoreRequest;
use App\Http\Requests\Siswa\UpdateRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SiswaService $service)
    {
        return $service->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, SiswaService $service)
    {
        return $service->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SiswaService $service, $id)
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
    public function update(UpdateRequest $request, SiswaService $service, $id)
    {
        return $service->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiswaService $service, $id)
    {
        return $service->destroy($id);
    }
}
