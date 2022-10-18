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
        try {
            $students = $this->siswaInterface->all();

            if (count($students) > 0) {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => SiswaResource::collection($students)
                    ],
                    [
                        route('siswa.index')
                    ]
                );
            } else {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => 'Tidak ada data yang tersedia'
                    ],
                    [
                        route('siswa.index')
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('siswa.index')
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
        try {
            $student = $this->siswaInterface->create($request);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new SiswaResource($student)
                ],
                [
                    route('siswa.store')
                ]
            );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('siswa.store')
                ]
            );
        }
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        try {
            $student = $this->siswaInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new SiswaResource($student)
                ],
                [
                    route('siswa.show', $id)
                ]
            );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('siswa.show', $id)
                ]
            );
        }
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        try {
            $this->siswaInterface->update(intval($id), $request);

            if (!empty($request)) {
                $student = $this->siswaInterface->findById($id);

                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => new SiswaResource($student)
                    ],
                    [
                        route('siswa.update', $id)
                    ]
                );
            } else {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => 'Tidak ada data yang diubah'
                    ],
                    [
                        route('siswa.update', $id)
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('siswa.update', $id)
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
        try {
            $this->siswaInterface->deleteById($id);
            $students = $this->siswaInterface->all();

            return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => SiswaResource::collection($students)
            ],
            [
                route('siswa.destroy', $id)
            ]
        );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('siswa.destroy', $id)
                ]
            );
        }
    }
}