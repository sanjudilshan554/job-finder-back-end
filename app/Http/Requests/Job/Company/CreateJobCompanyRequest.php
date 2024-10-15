<?php

namespace App\Http\Requests\Job\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobCompanyRequest extends FormRequest
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
            'status' => 'required',
            'name' => 'required|string|max:255',
            'web_address' => 'required|string',
            'email' => 'required|email|unique',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            // 'image_id' => 'required',
        ];
    } 
}
