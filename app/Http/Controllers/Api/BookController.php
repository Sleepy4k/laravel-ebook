<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiRespons;
use App\Services\Api\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;

class BookController extends Controller
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
    public function index(BookService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.book.store'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, BookService $service)
    {
        try {
            return $service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.book.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookService $service, $id)
    {
        try {
            return $service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.book.show', $id));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, BookService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.book.update', $id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookService $service, $id)
    {
        try {
            return $service->destroy($id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.book.destroy', $id));
        }
    }
}
