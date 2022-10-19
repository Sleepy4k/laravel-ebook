<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiRespons;
use App\Services\Api\AuditService;
use App\Http\Controllers\Controller;

class AuditController extends Controller
{
    use ApiRespons;

    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    private function catchError($error, $route)
    {
        return $this->createResponse(500, 'Server Error',
            [
                'error' => $error->getMessage()
            ],
            [
                $route
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuditService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.audit.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AuditService $service, $id)
    {
        try {
            return $service->show($id);
        } catch (\Throwable $th) {
            return $this->catchError($th, route('api.audit.show', $id));
        }
    }
}
