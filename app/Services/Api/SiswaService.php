<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\SiswaResource;

class SiswaService
{
    use ApiRespons;

    /**
     * @var siswaInterface
     */
    private $siswaInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\SiswaInterface $siswaInterface
     */
    public function __construct(Models\SiswaInterface $siswaInterface)
    {
        $this->siswaInterface = $siswaInterface;
    }

    /**
     * Index function.
     */
    public function index()
    {
        $students = $this->siswaInterface->all();

        if (count($students) > 0) {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => SiswaResource::collection($students)
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
        $student = $this->siswaInterface->create($request);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new SiswaResource($student)
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
        $student = $this->siswaInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new SiswaResource($student)
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
        $this->siswaInterface->update(intval($id), $request);

        if (!empty($request)) {
            $student = $this->siswaInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new SiswaResource($student)
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
        $this->siswaInterface->deleteById($id);
        $students = $this->siswaInterface->all();

        return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => SiswaResource::collection($students)
            ],
            [
                route('api.siswa.destroy', $id)
            ]
        );
    }
}