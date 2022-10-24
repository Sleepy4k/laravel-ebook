<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\AuthorResource;

class AuthorService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        $authors = $this->authorInterface->all();

        if (count($authors) > 0) {
            return $this->createResponse('Data berhasil diterima', route('api.author.index'), [
                'data' => AuthorResource::collection($authors)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diterima', route('api.author.index'), [
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
        $author = $this->authorInterface->create($request);

        return $this->createResponse('Data berhasil dibuat', route('api.author.store'), [
            'data' => new AuthorResource($author)
        ], 201);
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $author = $this->authorInterface->findById($id);

        return $this->createResponse('Data berhasil diterima', route('api.author.show', $id), [
            'data' => new AuthorResource($author)
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
        $this->authorInterface->update(intval($id), $request);

        if (!empty($request)) {
            $author = $this->authorInterface->findById($id);

            return $this->createResponse('Data berhasil diubah', route('api.author.update', $id), [
                'data' => new AuthorResource($author)
            ], 202);
        } else {
            return $this->createResponse('Data berhasil diubah', route('api.author.update', $id), [
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
        $this->authorInterface->deleteById($id);
        $authors = $this->authorInterface->all();

        return $this->createResponse('Data berhasil dihapus', route('api.author.destroy', $id), [
            'data' => AuthorResource::collection($authors)
        ], 202);
    }
}