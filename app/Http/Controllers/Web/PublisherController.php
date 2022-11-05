<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\PublisherService;
use App\DataTables\PublisherDataTable;
use App\Http\Controllers\WebController;
use App\Http\Requests\Web\Publisher\StoreRequest;
use App\Http\Requests\Web\Publisher\UpdateRequest;

class PublisherController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublisherService $service, PublisherDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.publisher', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PublisherService $service)
    {
        try {
            return view('partials.form.publisher.create', $service->create());
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
    public function store(StoreRequest $request, PublisherService $service)
    {
        try {
            $service->store($request->validated());
        
            return to_route('table.publisher.index');
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
    public function show(PublisherService $service, $id)
    {
        try {
            return view('partials.form.publisher.show', $service->show($id));
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
    public function edit(PublisherService $service, $id)
    {
        try {
            return view('partials.form.publisher.edit', $service->edit($id));
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
    public function update(UpdateRequest $request, PublisherService $service, $id)
    {
        try {
            $service->update($request->validated(), $id);
        
            return to_route('table.publisher.index');
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
    public function destroy(PublisherService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
