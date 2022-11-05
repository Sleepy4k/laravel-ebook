<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebController;
use App\DataTables\BookCategoryDataTable;
use App\Services\Web\BookCategoryService;
use App\Http\Requests\Web\BookCategory\StoreRequest;
use App\Http\Requests\Web\BookCategory\UpdateRequest;

class BookCategoryController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookCategoryService $service, BookCategoryDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.bookcategory', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookCategoryService $service)
    {
        try {
            return view('partials.form.bookcategory.create', $service->create());
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
    public function store(StoreRequest $request, BookCategoryService $service)
    {
        try {
            $service->store($request->validated());
        
            return to_route('table.category.index');
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
    public function show(BookCategoryService $service, $id)
    {
        try {
            return view('partials.form.bookcategory.show', $service->show($id));
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
    public function edit(BookCategoryService $service, $id)
    {
        try {
            return view('partials.form.bookcategory.edit', $service->edit($id));
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
    public function update(UpdateRequest $request, BookCategoryService $service, $id)
    {
        try {
            $service->update($request->validated(), $id);
        
            return to_route('table.category.index');
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
    public function destroy(BookCategoryService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
