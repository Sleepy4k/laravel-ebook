<?php

namespace App\Services\Web;

use App\Services\Service;

class BookCategoryService extends Service
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
            'bookCategories' => $this->bookCategoryInterface->all(['id', 'nama'])
        ];
    }

    /**
     * Store function.
     * 
     * @param $request
     */
    public function store($request)
    {
        $this->bookCategoryInterface->create($request);
 
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
            'bookCategory' => $this->bookCategoryInterface->findById($id, ['id', 'nama'])
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
            'bookCategory' => $this->bookCategoryInterface->findById($id, ['id', 'nama'])
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
        $this->bookCategoryInterface->update($id, $request);

        return toastr()->success('Data berhasil diubah', 'System');
    }
    
    /**
     * Destroy function.
     * 
     * @param $id
     */
    public function destroy($id)
    {
        $this->bookCategoryInterface->deleteById($id);

        return toastr()->success('Data berhasil dihapus', 'System');
    }
}