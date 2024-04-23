<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|max:200',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is not blank',
            'email.email' => 'Email invalidate',
            'password.required' => 'Password is not blank',
            'password.min' => 'Password must be :min characters or more',
            'password.max' => 'Password must not exceed :max characters',
        ];
    }
}
