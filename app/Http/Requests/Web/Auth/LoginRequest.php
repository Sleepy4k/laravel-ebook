<?php

namespace App\Http\Requests\Web\Auth;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required','max:255','string'],
            'password' => ['required','min:8','max:255','string']
        ];
    }
}
