<?php

namespace App\Http\Requests\Book;

use App\Traits\ApiRespons;
use App\Enums\BookStatusEnum;
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
            'judul' => ['required','string','max:255','unique:books,judul'],
            'deskripsi' => ['required','string'],
            'author_id' => ['required','numeric'],
            'publisher_id' => ['required','numeric'],
            'category_id' => ['required','numeric'],
            'tanggal_terbit' => ['required','date_format:d-m-Y'],
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
     * Custom error message for validation
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->createResponse(500, 'Server Error',
                [
                    'error' => $validator->errors()
                ],
                [
                    route('api.book.index')
                ]
            )
        );
    }
}
