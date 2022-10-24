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
        return $this->createResponse('Server Error', $route, [
            'data' => $error->getMessage()
        ], 500);
    }
}
