<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\PublisherResource;

class PublisherService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $students = $this->publisherInterface->all();

        if (count($students) > 0) {
            return $this->createResponse('Data berhasil diterima', route('api.student.index'), [
                'data' => PublisherResource::collection($students)
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
        $student = $this->publisherInterface->create($request);

        return $this->createResponse('Data berhasil dibuat', route('api.student.store'), [
            'data' => new PublisherResource($student)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $student = $this->publisherInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.student.show', $id), [
            'data' => new PublisherResource($student)
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
        $this->publisherInterface->update(intval($id), $request);

        if (!empty($request)) {
            $student = $this->publisherInterface->findById($id);

            return $this->createResponse('Data berhasil diubah', route('api.student.update', $id), [
                'data' => new PublisherResource($student)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diubah', route('api.student.update', $id), [
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
        $this->publisherInterface->deleteById($id);
        $students = $this->publisherInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.student.destroy', $id), [
            'data' => PublisherResource::collection($students)
        ], 202);
    }
}