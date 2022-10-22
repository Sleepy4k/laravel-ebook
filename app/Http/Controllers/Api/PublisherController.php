<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiRespons;
use App\Http\Controllers\Controller;
use App\Services\Api\PublisherService;
use App\Http\Requests\Publisher\StoreRequest;
use App\Http\Requests\Publisher\UpdateRequest;

class PublisherController extends Controller
{
    use ApiRespons;

    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    private function catchError($error, $route)
    {
        return $this->createResponse(500, 'Server Error',
            [
                'error' => $error->getMessage()
            ],
            [
                $route
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublisherService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.publisher.index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, PublisherService $service)
    {
        try {
            return $service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.publisher.store'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PublisherService $service, $id)
    {
        try {
            return $service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.publisher.show', $id));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PublisherService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.publisher.update', $id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublisherService $service, $id)
    {
        try {
            return $service->destroy($id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.publisher.destroy', $id));
        }
    }
}
