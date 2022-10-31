<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\StudentService;
use App\DataTables\StudentDataTable;
use App\Http\Requests\Web\Student\StoreRequest;
use App\Http\Requests\Web\Student\UpdateRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentService $service, StudentDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.student', $service->index());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentService $service)
    {
        return view('partials.form.student.create', $service->create());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, StudentService $service)
    {
        $service->store($request->validated());
    
        return redirect(route('table.student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentService $service, $id)
    {
        return view('partials.form.student.show', $service->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentService $service, $id)
    {
        return view('partials.form.student.edit', $service->edit($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, StudentService $service, $id)
    {
        $service->update($request->validated(), $id);
    
        return redirect(route('table.student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentService $service, $id)
    {
        $service->destroy($id);

        return back();
    }
}
