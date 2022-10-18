<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\AuthorResource;

class AuthorService
{
    use ApiRespons;

    /**
     * @var authorInterface
     */
    private $authorInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\AuthorInterface $authorInterface
     */
    public function __construct(Models\AuthorInterface $authorInterface)
    {
        $this->authorInterface = $authorInterface;
    }

    /**
     * Index function.
     */
    public function index()
    {
        try {
            $authors = $this->authorInterface->all();

            if (count($authors) > 0) {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => AuthorResource::collection($authors)
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
            $author = $this->authorInterface->create($request);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new AuthorResource($author)
                ],
                [
                    route('author.store')
                ]
            );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('author.store')
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
            $author = $this->authorInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new AuthorResource($author)
                ],
                [
                    route('author.show', $id)
                ]
            );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('author.show', $id)
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
            $this->authorInterface->update(intval($id), $request);

            if (!empty($request)) {
                $author = $this->authorInterface->findById($id);

                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => new AuthorResource($author)
                    ],
                    [
                        route('author.update', $id)
                    ]
                );
            } else {
                return $this->createResponse(200, 'Data berhasil diterima',
                    [
                        'data' => 'Tidak ada data yang diubah'
                    ],
                    [
                        route('author.update', $id)
                    ]
                );
            }
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('author.update', $id)
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
            $this->authorInterface->deleteById($id);
            $authors = $this->authorInterface->all();

            return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => AuthorResource::collection($authors)
            ],
            [
                route('author.destroy', $id)
            ]
        );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('author.destroy', $id)
                ]
            );
        }
    }
}