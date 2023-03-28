<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCityRequest extends FormRequest
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
                'nullable',
                Rule::unique('cities')->ignore($this->city),
            ],
            'name' => [
                'required',
                Rule::unique('cities')->ignore($this->city),
            ],
            'country_id' => 'required|exists:countries,id',
        ];
    }
}
