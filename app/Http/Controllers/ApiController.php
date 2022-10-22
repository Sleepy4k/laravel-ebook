<?php

namespace App\Http\Controllers;

use App\Traits\ApiRespons;

class ApiController extends Controller
{
    use ApiRespons;
    
    /**
     * Handler try catch error.
     *
     * @return \Illuminate\Http\Response
     */
    protected function catchError($error, $route)
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
}
