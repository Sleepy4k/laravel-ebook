<?php

namespace App\Http\Requests\Api\Book;

use App\Enums\BookStatusEnum;
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
            'title' => ['required','string','max:255','unique:books,title'],
            'description' => ['required','string'],
            'author_id' => ['required','numeric'],
            'publisher_id' => ['required','numeric'],
            'category_id' => ['required','numeric'],
            'date_of_issue' => ['required','date_format:d-m-Y'],
            'available' => ['nullable','string','max:255',Rule::in(BookStatusEnum::$status)]
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
            'available' => 'Data `available` tidak valid, data harus bernilai Y atau N'
        ];
    }
}
