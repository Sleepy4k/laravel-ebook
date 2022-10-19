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
        return $this->createResponse(200, 'Data berhasil diterima',
            [
                'data' => new HomeResource($this->userInterface->findById(1))
            ],
            [
                route('me.index')
            ]
        );
    }
}