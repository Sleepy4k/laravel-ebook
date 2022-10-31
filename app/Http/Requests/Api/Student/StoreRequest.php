<?php

namespace App\Http\Requests\Api\Student;

use App\Enums\GenderEnum;
use App\Traits\ApiRespons;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    use ApiRespons;

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = false;

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
            'kelamin' => 'Data `kelamin` tidak valid, data harus bernilai putra atau putri'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            // 
        ]);
    }

    /**
     * Custom error message for validation
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->createResponse('Server Error', route('api.student.index'), [
                'data' => $validator->errors()
            ], 400)
        );
    }
}
