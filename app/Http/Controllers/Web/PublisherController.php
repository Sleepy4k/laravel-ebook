<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\PublisherService;
use App\DataTables\PublisherDataTable;
use App\Http\Requests\Web\Publisher\StoreRequest;
use App\Http\Requests\Web\Publisher\UpdateRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublisherService $service, PublisherDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.publisher', $service->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PublisherService $service)
    {
        return view('partials.form.publisher.create', $service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, PublisherService $service)
    {
        $service->store($request->validated());
    
        return redirect(route('table.publisher.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PublisherService $service, $id)
    {
        return view('partials.form.publisher.show', $service->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PublisherService $service, $id)
    {
        return view('partials.form.publisher.edit', $service->edit($id));
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
        $service->update($request->validated(), $id);
    
        return redirect(route('table.publisher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublisherService $service, $id)
    {
        $service->destroy($id);

        return back();
    }
}
