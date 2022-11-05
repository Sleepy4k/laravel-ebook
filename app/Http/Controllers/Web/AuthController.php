<?php

namespace App\Http\Controllers\Web;

use App\DataTables\AuthDataTable;
use App\Http\Controllers\WebController;

class AuthController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.auth');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
