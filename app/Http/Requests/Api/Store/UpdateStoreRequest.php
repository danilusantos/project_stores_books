<?php

namespace App\Http\Requests\Api\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
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
        // Add id to request
        if (! $this->has('id')) {
            $this->merge([
                'id' => $this->store
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
            'id' => "required|integer|unique:stores,id,{$this->id},id",
            'name' => 'required|max:100',
            'address' => 'max:150|nullable',
            'active' => 'boolean|nullable'
        ];
    }
}
