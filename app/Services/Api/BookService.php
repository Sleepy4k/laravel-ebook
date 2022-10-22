<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\BookResource;

class BookService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $books = $this->bookInterface->all();

        if (count($books) > 0) {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => BookResource::collection($books)
                ],
                [
                    route('api.book.index')
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang tersedia'
                ],
                [
                    route('api.book.index')
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
        $book = $this->bookInterface->create($request);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new BookResource($book)
            ],
            [
                route('api.book.store')
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
        $book = $this->bookInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new BookResource($book)
            ],
            [
                route('api.book.show', $id)
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
        $this->bookInterface->update(intval($id), $request);

        if (!empty($request)) {
            $book = $this->bookInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new BookResource($book)
                ],
                [
                    route('api.book.update', $id)
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang diubah'
                ],
                [
                    route('api.book.update', $id)
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
        $this->bookInterface->deleteById($id);
        $books = $this->bookInterface->all();

        return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => BookResource::collection($books)
            ],
            [
                route('api.book.destroy', $id)
            ]
        );
    }
}