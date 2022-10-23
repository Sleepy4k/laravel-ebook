<?php

namespace App\Http\Requests\Web\Book;

use App\Enums\BookStatusEnum;
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
            'judul' => ['nullable','string','max:255','unique:books,judul'],
            'deskripsi' => ['nullable','string'],
            'author_id' => ['nullable','numeric'],
            'publisher_id' => ['nullable','numeric'],
            'category_id' => ['nullable','numeric'],
            'tanggal_terbit' => ['nullable'],
            'tersedia' => ['nullable','string','max:255',Rule::in(BookStatusEnum::$status)]
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
            'tersedia' => 'Data `tersedia` tidak valid, data harus bernilai Y atau N'
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
