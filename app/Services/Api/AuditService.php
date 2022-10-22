<?php

namespace App\Services\Api;

use App\Services\ApiService;
use App\Http\Resources\AuditResource;

class AuditService extends ApiService
{
    /**
     * Index function.
     */
    public function index()
    {
        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => AuditResource::collection($this->auditInterface->all())
            ],
            [
                route('api.audit.index')
            ]
        );
    }

    /**
     * Show function.
     * 
     * @param $path
     */
    public function show($id)
    {
        $audit = $this->auditInterface->findById($id);

        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new AuditResource($audit)
            ],
            [
                route('api.audit.show', $id)
            ]
        );
    }
}