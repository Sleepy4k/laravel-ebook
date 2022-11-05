<?php

namespace App\Http\Controllers\Web;

use App\DataTables\QueryDataTable;
use App\Http\Controllers\WebController;

class QueryController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.query');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
