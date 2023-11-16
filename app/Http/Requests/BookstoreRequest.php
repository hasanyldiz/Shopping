<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookstoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'BookName' =>'required|max:50',
            'BookPrice' =>'required'
        ];
    }
    public function messages(): array
{
    return [
        'BookName.required'  => 'Kitap adı zorunludur',
        'BookPrice.required' => 'Kitap fiyatı zorunludur',
        'BookName.max'       => 'Kitap adı en fazla 50 karakter olmalıdır',
        
    ];
}
}
