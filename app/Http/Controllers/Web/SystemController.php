<?php

namespace App\Http\Controllers\Web;

use App\DataTables\SystemDataTable;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SystemDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.system');
    }
}
