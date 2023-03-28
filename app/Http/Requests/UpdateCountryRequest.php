<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {


        return [
            'code' => [
                'required',
                Rule::unique('countries')->ignore($this->country),
            ],
            'name' => [
                'required',
                Rule::unique('countries')->ignore($this->country),
            ],

        ];
    }
}
