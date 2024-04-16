<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required',
            
            'description' => 'required|min:10',
            'content' => 'required|min:20',
            'id_category' => ['required', 'integer', function($attribute, $value, $fail){
                if ($value==0) {
                    $fail('Unselected category');
                }
            }],
            'img_url' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Post title is not blank',
            'description.required' => 'Description is not blank',
            'description.min' => 'Description at least 10 characters',
            'content.required' => 'Content is not blank',
            'content.min' => 'Content of at least 20 characters',
            'id_category.required' => 'Unselected category',
            'id_category.integer' => 'Invalid category',
            'img_url.required' => 'Image is not blank',
        ];
    }
}
