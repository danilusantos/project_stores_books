<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Substituir vírgulas por pontos em 'value' se estiver presente
        if ($this->has('value')) {
            $this->merge([
                'value' => str_replace(',', '.', $this->input('value'))
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100',
            'isbn' => 'nullable|numeric',
            'value' => 'nullable|numeric|between:0.00,99999999.99'
        ];
    }
}
