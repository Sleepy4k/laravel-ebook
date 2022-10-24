<?php

namespace App\Http\Controllers\Web;

use App\DataTables\QueryDataTable;
use App\Http\Controllers\Controller;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.query');
    }
}
