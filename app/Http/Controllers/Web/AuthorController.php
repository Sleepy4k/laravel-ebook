<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\AuthorService;
use App\DataTables\AuthorDataTable;
use App\Http\Controllers\WebController;
use App\Http\Requests\Web\Author\StoreRequest;
use App\Http\Requests\Web\Author\UpdateRequest;

class AuthorController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthorService $service, AuthorDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.author', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AuthorService $service)
    {
        try {
            return view('partials.form.author.create', $service->create());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, AuthorService $service)
    {
        try {
            $service->store($request->validated());
        
            return to_route('table.author.index');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorService $service, $id)
    {
        try {
            return view('partials.form.author.show', $service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorService $service, $id)
    {
        try {
            return view('partials.form.author.edit', $service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
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
        try {
            $service->update($request->validated(), $id);
        
            return to_route('table.author.index');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
