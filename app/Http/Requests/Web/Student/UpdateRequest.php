<?php

namespace App\Http\Requests\Web\Student;

use App\Enums\GenderEnum;
use Illuminate\Validation\Rule;
use App\Http\Requests\WebRequest;

class UpdateRequest extends WebRequest
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
            'grade' => ['required','string','max:255',Rule::in(GenderEnum::$gender)],
            'email' => ['required', 'string','max:255','email:dns','unique:students,email'],
            'phone' => ['required','string','max:255'],
            'address' => ['required','string'],
            'grade_type' => ['required','string','max:255'],
            'grade_mayor' => ['required','string','max:255'],
            'grade_number' => ['required','string','max:255']
        ];
    }
}
