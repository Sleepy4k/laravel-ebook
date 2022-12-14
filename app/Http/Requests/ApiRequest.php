<?php

namespace App\Http\Requests;

use App\Traits\ApiRespons;
use Illuminate\Contracts\Validation\Validator;

class ApiRequest extends Request
{
    use ApiRespons;

    /**
     * Custom error message for validation
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $response = $this->createResponse('Server Error', request()->url(), [
            'error' => $errors->messages()
        ], 422);

        abort($response);
    }
}
