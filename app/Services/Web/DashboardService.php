<?php

namespace App\Services\Web;

use App\Services\WebService;

class DashboardService extends WebService
{
    /**
     * Index function.
     */
    public function index()
    {
        return [
            'books' => $this->bookInterface->all(['*'], ['author'], [], 'date_of_issue'),
            'authors' => $this->authorInterface->all(['id'])->count(),
            'students' => $this->studentInterface->all(['id'])->count(),
            'publisher' => $this->publisherInterface->all(['id'])->count(),
            'bookCategory' => $this->bookCategoryInterface->paginate(5, ['*'], ['books']),

            'total_book' => $this->getTableData('books', 'date_of_issue')
        ];
    }
}