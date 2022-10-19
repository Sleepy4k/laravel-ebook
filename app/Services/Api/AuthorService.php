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
        $authors = $this->authorInterface->all();

        if (count($authors) > 0) {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => AuthorResource::collection($authors)
                ],
                [
                    route('api.author.index')
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang tersedia'
                ],
                [
                    route('api.author.index')
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
        $author = $this->authorInterface->create($request);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new AuthorResource($author)
            ],
            [
                route('api.author.store')
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
        $author = $this->authorInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new AuthorResource($author)
            ],
            [
                route('api.author.show', $id)
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
        $this->authorInterface->update(intval($id), $request);

        if (!empty($request)) {
            $author = $this->authorInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new AuthorResource($author)
                ],
                [
                    route('api.author.update', $id)
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang diubah'
                ],
                [
                    route('api.author.update', $id)
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
        $this->authorInterface->deleteById($id);
        $authors = $this->authorInterface->all();

        return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => AuthorResource::collection($authors)
            ],
            [
                route('api.author.destroy', $id)
            ]
        );
    }
}