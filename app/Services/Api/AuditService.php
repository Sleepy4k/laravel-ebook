<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\AuditResource;

class AuditService
{
    use ApiRespons;

    /**
     * @var auditInterface
     */
    private $auditInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\AuditInterface $auditInterface
     */
    public function __construct(Models\AuditInterface $auditInterface)
    {
        $this->auditInterface = $auditInterface;
    }

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