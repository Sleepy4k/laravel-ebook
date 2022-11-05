<?php

namespace App\Http\Controllers\Web;

use App\DataTables\ModelDataTable;
use App\Http\Controllers\WebController;

class ModelController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModelDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.dashboard.model');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
