<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'name' => 'required|max:50',
            'gender' => ['required',Rule::in(['1', '2','3'])],
            'birthday' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
