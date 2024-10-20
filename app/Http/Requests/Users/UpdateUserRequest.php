<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user_id');
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(User::class)->ignore($userId)],
            'password' => ['nullable', 'min:8'],
            'con_password' => ['nullable', 'min:8', 'same:password'],
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'con_password.required' => 'Confirmation password is required',
            'con_password.same' => 'The confirmation password must match the password',
        ];
    }
}
