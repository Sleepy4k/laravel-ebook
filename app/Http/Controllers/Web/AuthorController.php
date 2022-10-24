<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\AuthorService;
use App\DataTables\AuthorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Author\StoreRequest;
use App\Http\Requests\Web\Author\UpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthorService $service, AuthorDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.author', $service->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AuthorService $service)
    {
        return view('partials.form.author.create', $service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, AuthorService $service)
    {
        $service->store($request->validated());
    
        return redirect(route('table.author.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorService $service, $id)
    {
        return view('partials.form.author.show', $service->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorService $service, $id)
    {
        return view('partials.form.author.edit', $service->edit($id));
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
        $service->update($request->validated(), $id);
    
        return redirect(route('table.author.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorService $service, $id)
    {
        $service->destroy($id);

        return back();
    }
}
