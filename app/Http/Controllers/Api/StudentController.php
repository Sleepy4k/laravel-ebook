<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\StudentService;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\Student\StoreRequest;
use App\Http\Requests\Api\Student\UpdateRequest;

class StudentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, StudentService $service)
    {
        try {
            return $service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentService $service, $id)
    {
        try {
            return $service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, StudentService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentService $service, $id)
    {
        try {
            return $service->destroy($id);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
