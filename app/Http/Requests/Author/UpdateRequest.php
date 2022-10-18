<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'kelamin' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'nomor_hp' => ['nullable', 'string', 'max:255']
        ];
    }
}