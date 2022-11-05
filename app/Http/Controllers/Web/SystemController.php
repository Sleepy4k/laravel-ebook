<?php

namespace App\Http\Controllers\Web;

use App\DataTables\SystemDataTable;
use App\Http\Controllers\WebController;

class SystemController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SystemDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.system');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
