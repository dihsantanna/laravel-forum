<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Mudar quando houver autenticação.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'subject' => [
                'required',
                'min:3',
                'max:255',
                'unique:supports'
            ],
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ]
        ];

        if ($this->method() === 'PUT') {
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('supports')->ignore($this->id)
            ];
        }

        return $rules;
    }
}
