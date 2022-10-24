<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\SiswaResource;

class SiswaService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $students = $this->siswaInterface->all();

        if (count($students) > 0) {
            return $this->createResponse('Data berhasil diterima', route('api.siswa.index'), [
                'data' => SiswaResource::collection($students)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.siswa.index'), [
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
        $student = $this->siswaInterface->create($request);

        return $this->createResponse('Data berhasil dibuat', route('api.siswa.store'), [
            'data' => new SiswaResource($student)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $student = $this->siswaInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.siswa.show', $id), [
            'data' => new SiswaResource($student)
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
        $this->siswaInterface->update(intval($id), $request);

        if (!empty($request)) {
            $student = $this->siswaInterface->findById($id);

            return $this->createResponse('Data berhasil diterima', route('api.siswa.update', $id), [
                'data' => new SiswaResource($student)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.siswa.update', $id), [
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
        $this->siswaInterface->deleteById($id);
        $students = $this->siswaInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.siswa.destroy', $id), [
            'data' => SiswaResource::collection($students)
        ], 202);
    }
}