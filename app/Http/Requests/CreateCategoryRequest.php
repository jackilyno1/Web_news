<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            // 'name' => 'required|max:200|unique:categories',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Category name is not blank',
            'name.max' => 'Category name must not exceed :max characters',
            'name.unique' => 'Name already exists on the system',
        ];
    }
}
