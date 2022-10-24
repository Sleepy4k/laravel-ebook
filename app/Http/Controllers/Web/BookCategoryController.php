<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\DataTables\BookCategoryDataTable;
use App\Services\Web\BookCategoryService;
use App\Http\Requests\Web\BookCategory\StoreRequest;
use App\Http\Requests\Web\BookCategory\UpdateRequest;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookCategoryService $service, BookCategoryDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.bookcategory', $service->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookCategoryService $service)
    {
        return view('partials.form.bookcategory.create', $service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, BookCategoryService $service)
    {
        $service->store($request->validated());
    
        return redirect(route('table.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookCategoryService $service, $id)
    {
        return view('partials.form.bookcategory.show', $service->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookCategoryService $service, $id)
    {
        return view('partials.form.bookcategory.edit', $service->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, BookCategoryService $service, $id)
    {
        $service->update($request->validated(), $id);
    
        return redirect(route('table.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCategoryService $service, $id)
    {
        $service->destroy($id);

        return back();
    }
}
