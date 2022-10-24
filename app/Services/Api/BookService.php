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
            return $this->createResponse('Data berhasil diterima', route('api.book.index'), [
                'data' => BookResource::collection($books)
            ]);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.book.index'), [
                'data' => 'Tidak ada data yang tersedia'
            ]);
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

        return $this->createResponse('Data berhasil dibuat', route('api.book.store'), [
            'data' => new BookResource($book)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $book = $this->bookInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.book.show', $id), [
            'data' => new BookResource($book)
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
        $this->bookInterface->update(intval($id), $request);

        if (!empty($request)) {
            $book = $this->bookInterface->findById($id);

            return $this->createResponse('Data berhasil diubah', route('api.book.update', $id), [
                'data' => new BookResource($book)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diubah', route('api.book.update', $id), [
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
        $this->bookInterface->deleteById($id);
        $books = $this->bookInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.book.destroy', $id), [
            'data' => BookResource::collection($books)
        ], 202);
    }
}