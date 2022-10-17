<?php

namespace App\Services\Api;

use App\Contracts\Models;
use App\Traits\ApiRespons;
use App\Http\Resources\HomeResource;

class HomeService
{
    use ApiRespons;

    /**
     * @var userInterface
     */
    private $userInterface;

    /**
     * Account service constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     */
    public function __construct(Models\UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Index function.
     */
    public function index()
    {
        try {
            return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => HomeResource::collection($this->userInterface->all())
            ],
            [
                route('home.index')
            ]
        );
        } catch (\Throwable $th) {
            return $this->createResponse(500, 'Server Error',
                [
                    'error' => $th->getMessage()
                ],
                [
                    route('livestock.index')
                ]
            );
        }
    }
}