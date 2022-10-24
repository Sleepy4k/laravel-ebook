<?php

namespace App\Http\Controllers\Web;

use App\DataTables\AuthDataTable;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard.auth');
    }
}
