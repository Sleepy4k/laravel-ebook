<?php

namespace App\Http\Requests\Web\Book;

use App\Enums\BookStatusEnum;
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
            'title' => ['required','string','max:255','unique:books,title'],
            'description' => ['required','string'],
            'author_id' => ['required','numeric'],
            'publisher_id' => ['required','numeric'],
            'category_id' => ['required','numeric'],
            'date_of_issue' => ['required'],
            'available' => ['required','string','max:255',Rule::in(BookStatusEnum::$status)]
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
}
