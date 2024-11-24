<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required',
            'brand'=> 'required',
            'photo'=> 'required|image|mimes:png',
            'logo'=> 'required|image|mimes:png',
            'description'=> 'required'
        ];
    }
}
