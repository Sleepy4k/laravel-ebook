<?php

namespace App\Http\Requests\Web\Auth;

use App\Http\Requests\WebRequest;

class RegisterRequest extends WebRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','max:255','string'],
            'username' => ['required','max:255','string','unique:users,username'],
            'password' => ['required','min:8','max:255','string','confirmed']
        ];
    }
}
