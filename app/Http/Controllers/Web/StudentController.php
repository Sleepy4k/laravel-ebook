<?php

namespace App\Http\Controllers\Web;

use App\Services\Web\StudentService;
use App\DataTables\StudentDataTable;
use App\Http\Controllers\WebController;
use App\Http\Requests\Web\Student\StoreRequest;
use App\Http\Requests\Web\Student\UpdateRequest;

class StudentController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentService $service, StudentDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.student', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentService $service)
    {
        try {
            return view('partials.form.student.create', $service->create());
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
    public function store(StoreRequest $request, StudentService $service)
    {
        try {
            $service->store($request->validated());
        
            return to_route('table.student.index');
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
    public function show(StudentService $service, $id)
    {
        try {
            return view('partials.form.student.show', $service->show($id));
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
    public function edit(StudentService $service, $id)
    {
        try {
            return view('partials.form.student.edit', $service->edit($id));
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
    public function update(UpdateRequest $request, StudentService $service, $id)
    {
        try {
            $service->update($request->validated(), $id);
        
            return to_route('table.student.index');
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
    public function destroy(StudentService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
