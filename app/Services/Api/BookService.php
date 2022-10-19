<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\BookResource;

class BookService
{
    use ApiRespons;

    /**
     * @var bookInterface
     */
    private $bookInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\BookInterface $bookInterface
     */
    public function __construct(Models\BookInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
    }

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
                    route('book.index')
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang tersedia'
                ],
                [
                    route('book.index')
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
                route('book.store')
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
                route('book.show', $id)
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
                    route('book.update', $id)
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang diubah'
                ],
                [
                    route('book.update', $id)
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
                route('book.destroy', $id)
            ]
        );
    }
}