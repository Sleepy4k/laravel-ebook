<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\ApiRequest;

class RegisterRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255'],
            'username' => ['required','string','max:255','unique:users,username'],
            'password' => ['required','string','min:8','max:255','confirmed']
        ];
    }
}
