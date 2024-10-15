<?php

namespace App\Http\Requests\Job\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobCompanyRequest extends FormRequest
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
            'status' => 'nullable',
            'name' => 'required|string|max:255',
            'web_address' => 'nullable|string',
            'email' => 'nullable|email',
            'location' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            // 'image_id' => 'required',
        ];
    }
}
