<?php

namespace App\Http\Controllers\Web;

use App\DataTables\ModelDataTable;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModelDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.model');
    }
}
