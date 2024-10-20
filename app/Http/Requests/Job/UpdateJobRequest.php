<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'type_id' => 'required',
            'description' => 'nullable|string',
            'experience' => 'nullable|string',
            'location' => 'nullable|string',
            'salary' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'company_name' => 'nullable|string',
            'no_of_vacancy' => 'nullable|integer',
            'requirements' => 'nullable|string',
            // 'image_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'category_id.required' => 'The category filed is required.',
            'type_id.required' => 'The type filed is required.'
        ];
    }
}
