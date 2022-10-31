<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\StudentResource;

class StudentService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $students = $this->studentInterface->all();

        if (count($students) > 0) {
            return $this->createResponse('Data berhasil diterima', route('api.student.index'), [
                'data' => StudentResource::collection($students)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.student.index'), [
                'data' => 'Tidak ada data yang tersedia'
            ], 202);
        }
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $student = $this->studentInterface->create($request);

        return $this->createResponse('Data berhasil dibuat', route('api.student.store'), [
            'data' => new StudentResource($student)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $student = $this->studentInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.student.show', $id), [
            'data' => new StudentResource($student)
        ], 206);
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $this->studentInterface->update(intval($id), $request);

        if (!empty($request)) {
            $student = $this->studentInterface->findById($id);

            return $this->createResponse('Data berhasil diterima', route('api.student.update', $id), [
                'data' => new StudentResource($student)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.student.update', $id), [
                'data' => 'Tidak ada data yang diubah'
            ], 202);
        }
    }

    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->studentInterface->deleteById($id);
        $students = $this->studentInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.student.destroy', $id), [
            'data' => StudentResource::collection($students)
        ], 202);
    }
}