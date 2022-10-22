<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\BookCategoryResource;

class BookCategoryService
{
    use ApiRespons;

    /**
     * @var bookCategoryInterface
     */
    private $bookCategoryInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\BookCategoryInterface $bookCategoryInterface
     */
    public function __construct(Models\BookCategoryInterface $bookCategoryInterface)
    {
        $this->bookCategoryInterface = $bookCategoryInterface;
    }

    /**
     * Index function.
     */
    public function index()
    {
        $books = $this->bookCategoryInterface->all();

        if (count($books) > 0) {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => BookCategoryResource::collection($books)
                ],
                [
                    route('api.category.index')
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang tersedia'
                ],
                [
                    route('api.category.index')
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
        $book = $this->bookCategoryInterface->create($request);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new BookCategoryResource($book)
            ],
            [
                route('api.category.store')
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
        $book = $this->bookCategoryInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new BookCategoryResource($book)
            ],
            [
                route('api.category.show', $id)
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
        $this->bookCategoryInterface->update(intval($id), $request);

        if (!empty($request)) {
            $book = $this->bookCategoryInterface->findById($id);

            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => new BookCategoryResource($book)
                ],
                [
                    route('api.category.update', $id)
                ]
            );
        } else {
            return $this->createResponse(200, 'Data berhasil diterima',
                [
                    'data' => 'Tidak ada data yang diubah'
                ],
                [
                    route('api.update', $id)
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
        $this->bookCategoryInterface->deleteById($id);
        $books = $this->bookCategoryInterface->all();

        return $this->createResponse(200, 'Data berhasil dihapus',
            [
                'data' => BookCategoryResource::collection($books)
            ],
            [
                route('api.category.destroy', $id)
            ]
        );
    }
}