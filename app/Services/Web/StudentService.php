<?php

namespace App\Services\Web;

use App\Services\Service;

class StudentService extends Service
{
    /**
     * Index function.
     * 
     * @param $path
     */
    public function index()
    {
        return [];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function create()
    {
        return [
            'students' => $this->studentInterface->all()
        ];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        if (array_key_exists('grade_type', $request) && array_key_exists('grade_mayor', $request) && array_key_exists('grade_number', $request)) {
            $request['grade'] = $request['grade_type'] . ' ' . $request['grade_mayor'] . ' ' . $request['grade_number'];

            unset($request['grade_type']);
            unset($request['grade_mayor']);
            unset($request['grade_number']);
        } else {
            return toastr()->error('Data gagal dibuat', 'System');
        }

        $this->studentInterface->create($request);
 
        return toastr()->success('Data berhasil dibuat', 'System');
    }

    /**
     * Show function.
     * 
     * @param $path
     * @param $id
     */
    public function show($id)
    {
        return [
            'student' => $this->studentInterface->findById($id)
        ];
    }

    /**
     * Edit function.
     * 
     * @param $path
     * @param $id
     */
    public function edit($id)
    {
        return [
            'student' => $this->studentInterface->findById($id)
        ];
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $this->studentInterface->update($id, $request);

        return toastr()->success('Data berhasil diubah', 'System');
    }
    
    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->studentInterface->deleteById($id);

        return toastr()->success('Data berhasil dihapus', 'System');
    }
}