<?php

namespace App\Http\Requests\Web\Student;

use App\Enums\GenderEnum;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class StoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
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
            'grade_type' => ['required','string','max:255'],
            'grade_mayor' => ['required','string','max:255'],
            'grade_number' => ['required','string','max:255']
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
