<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UploadBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => '',
            'title' => 'required|max:255|string',
            'category_id' => 'required',
            'view_text' => 'required|max:255|string',
            'text' => 'required|string',
            'meta_tags' => 'string',
            'image_id' => 'image',
        ];
    }

    public function messages(){
        return[
            'title.required' => 'title is required',
            'category_id.required' => 'category field is required',
            'view_text.required' => 'view text field is required',
            'text.required' => 'text field is required',
        ];
    }
}
