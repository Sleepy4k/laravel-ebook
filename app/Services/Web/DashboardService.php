<?php

namespace App\Services\Web;

use App\Services\Service;

class DashboardService extends Service
{
    /**
     * Index function.
     */
    public function index()
    {
        return [
            'books' => $this->bookInterface->all(['*'], ['author'], [], 'tanggal_terbit'),
            'authors' => $this->authorInterface->all(['id'])->count(),
            'students' => $this->siswaInterface->all(['id'])->count(),
            'publisher' => $this->publisherInterface->all(['id'])->count(),
            'bookCategory' => $this->bookCategoryInterface->paginate(5, ['*'], ['books']),

            'total_book' => $this->getTableData('books', 'tanggal_terbit')
        ];
    }
}