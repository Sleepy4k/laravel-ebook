<?php

namespace App\Http\Controllers\Web;

use App\DataTables\BookDataTable;
use App\Services\Web\BookService;
use App\Http\Controllers\WebController;
use App\Http\Requests\Web\Book\StoreRequest;
use App\Http\Requests\Web\Book\UpdateRequest;

class BookController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookService $service, BookDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.book', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookService $service)
    {
        try {
            return view('partials.form.book.create', $service->create());
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
    public function store(StoreRequest $request, BookService $service)
    {
        try {
            $service->store($request->validated());
        
            return to_route('book.index');
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
    public function show(BookService $service, $id)
    {
        try {
            return view('partials.form.book.show', $service->show($id));
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
    public function edit(BookService $service, $id)
    {
        try {
            return view('partials.form.book.edit', $service->edit($id));
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
    public function update(UpdateRequest $request, BookService $service, $id)
    {
        try {
            $service->update($request->validated(), $id);
        
            return to_route('book.index');
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
    public function destroy(BookService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
