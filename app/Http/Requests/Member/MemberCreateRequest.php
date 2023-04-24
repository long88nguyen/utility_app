<?php

namespace App\Http\Requests\Member;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
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
            'user_id' => 'required|unique:members',
            'name' => 'required|max:50',
            'gender' => ['required',Rule::in(['1', '2','3'])],
            'birthday' => 'required|date_format:Y-m-d'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => "Vui lòng nhập user id",
            'user_id.unique' => "User id đã tồn tại vui lòng nhập id khác" 
        ];
    }
}
