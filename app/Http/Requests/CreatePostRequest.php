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
            'title' => 'required|max:200',
            'description' => 'required|min:10|max:500',
            'content' => 'required|min:20',
            'id_category' => ['exists:categories,id','required', 'integer', function($attribute, $value, $fail){
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
            'title.max' => 'Post title must not exceed :max characters',
            'description.required' => 'Description is not blank',
            'description.min' => 'Description at least :min characters',
            'description.max' => 'Description no more than :max characters',
            'content.required' => 'Content is not blank',
            'content.min' => 'Content of at least :min characters',
            'id_category.required' => 'Unselected category',
            'id_category.integer' => 'Invalid category',
            'img_url.required' => 'Image is not blank',
        ];
    }
}
