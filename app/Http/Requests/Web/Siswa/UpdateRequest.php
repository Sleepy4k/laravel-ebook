<?php

namespace App\Http\Requests\Web\Siswa;

use App\Enums\GenderEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateRequest extends FormRequest
{
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
            'nama' => ['nullable','string','max:255'],
            'umur' => ['nullable','string','max:255'],
            'kelamin' => ['nullable','string','max:255',Rule::in(GenderEnum::$gender)],
            'email' => ['nullable', 'string','max:255','email:dns','unique:siswas,email'],
            'nomor_hp' => ['nullable','string','max:255'],
            'alamat' => ['nullable','string'],
            'kelas' => ['nullable','string','max:255']
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
     * Custom error response for validation.
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        $toast = toastr();

        foreach ($validator->messages()->all() as $message) {
            $toast->error($message, 'Validation');
        }

        return $toast;
    }
}
