<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:200',
            'role' => 'required|in:user,admin',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'User name is not blank',
            'email.required' => 'Email is not blank',
            'email.email' => 'Email invalidate',
            'email.unique' => 'Email already exists on the system',
            'password.required' => 'Password is not blank',
            'password.min' => 'Password must be :min characters or more',
        ];
    }
}
