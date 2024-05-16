<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        // Replace , with . in 'value' if present
        if ($this->has('value')) {
            $this->merge([
                'value' => str_replace(',', '.', $this->input('value'))
            ]);
        }

        // Add id to request
        if (! $this->has('id')) {
            $this->merge([
                'id' => $this->book
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
            'id' => "required|integer|unique:books,id,{$this->id},id",
            'name' => 'required|max:100',
            'isbn' => 'nullable|numeric',
            'value' => 'nullable|decimal:0.00,99999999.99,'
        ];
    }
}
