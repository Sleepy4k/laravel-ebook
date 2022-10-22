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
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => PublisherResource::collection($students)
                ],
                [
                    route('api.siswa.index')
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang tersedia'
                ],
                [
                    route('api.siswa.index')
                ]
            );
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

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new PublisherResource($student)
            ],
            [
                route('api.siswa.store')
            ]
        );
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $student = $this->publisherInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new PublisherResource($student)
            ],
            [
                route('api.siswa.show', $id)
            ]
        );
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

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new PublisherResource($student)
                ],
                [
                    route('api.siswa.update', $id)
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang diubah'
                ],
                [
                    route('api.siswa.update', $id)
                ]
            );
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

        return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => PublisherResource::collection($students)
            ],
            [
                route('api.siswa.destroy', $id)
            ]
        );
    }
}