<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\DataTables\BookDataTable;
use App\Services\Web\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Book\StoreRequest;
use App\Http\Requests\Web\Book\UpdateRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookService $service, BookDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.book', $service->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookService $service)
    {
        return view('partials.form.book.create', $service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, BookService $service)
    {
        $service->store($request->validated());
    
        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookService $service, $id)
    {
        return view('partials.form.book.show', $service->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookService $service, $id)
    {
        return view('partials.form.book.edit', $service->edit($id));
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
        $service->update($request->validated(), $id);
    
        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookService $service, $id)
    {
        $service->destroy($id);

        return back();
    }
}
