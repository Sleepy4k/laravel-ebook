<?php

namespace App\Services\Web;

use App\Services\Service;

class BookService extends Service
{
    /**
     * Index function.
     * 
     * @param $path
     */
    public function index()
    {
        return [];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function create()
    {
        return [
            'authors' => $this->authorInterface->all(['id', 'name']),
            'publishers' => $this->publisherInterface->all(['id', 'name']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name'])
        ];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $this->bookInterface->create($request);
 
        return toastr()->success('Data berhasil dibuat', 'System');
    }

    /**
     * Show function.
     * 
     * @param $path
     * @param $id
     */
    public function show($id)
    {
        return [
            'book' => $this->bookInterface->findById($id, ['*'], ['author', 'publisher', 'category'])
        ];
    }

    /**
     * Edit function.
     * 
     * @param $path
     * @param $id
     */
    public function edit($id)
    {
        return [
            'book' => $this->bookInterface->findById($id),
            'authors' => $this->authorInterface->all(['id', 'name']),
            'publishers' => $this->publisherInterface->all(['id', 'name']),
            'categories' => $this->bookCategoryInterface->all(['id', 'name'])
        ];
    }

    /**
     * Update function.
     * 
     * @param $request
     * @param $id
     */
    public function update($request, $id)
    {
        $this->bookInterface->update($id, $request);

        return toastr()->success('Data berhasil diubah', 'System');
    }
    
    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->bookInterface->deleteById($id);

        return toastr()->success('Data berhasil dihapus', 'System');
    }
}