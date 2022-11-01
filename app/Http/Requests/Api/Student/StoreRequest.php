<?php

namespace App\Http\Requests\Api\Student;

use App\Enums\GenderEnum;
use Illuminate\Validation\Rule;
use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255'],
            'age' => ['required','string','max:255'],
            'gender' => ['required','string','max:255',Rule::in(GenderEnum::$gender)],
            'email' => ['required', 'string','max:255','email:dns','unique:students,email'],
            'phone' => ['required','string','max:255'],
            'address' => ['required','string'],
            'grade' => ['required','string','max:255']
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'gender' => 'Data `gender` tidak valid, data harus bernilai putra atau putri'
        ];
    }
}
