<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\BookCategoryResource;

class BookCategoryService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $books = $this->bookCategoryInterface->all();

        if (count($books) > 0) {
            return $this->createResponse('Data berhasil diterima', route('api.category.index'), [
                'data' => BookCategoryResource::collection($books)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.category.index'), [
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
        $book = $this->bookCategoryInterface->create($request);

        return $this->createResponse('Data berhasil dibuat', route('api.category.store'), [
            'data' => new BookCategoryResource($book)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $book = $this->bookCategoryInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.category.show', $id), [
            'data' => new BookCategoryResource($book)
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
        $this->bookCategoryInterface->update(intval($id), $request);

        if (!empty($request)) {
            $book = $this->bookCategoryInterface->findById($id);

            return $this->createResponse('Data berhasil diubah', route('api.category.update', $id), [
                'data' => new BookCategoryResource($book)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diubah', route('api.category.update', $id), [
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
        $this->bookCategoryInterface->deleteById($id);
        $books = $this->bookCategoryInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.category.destroy', $id), [
            'data' => BookCategoryResource::collection($books)
        ], 202);
    }
}