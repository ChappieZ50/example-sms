<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;

class RegisterRequest extends BaseRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|min:3|max:255',
            'email'    => 'required|unique:users,email|min:10|max:255',
            'password' => 'required|min:8|max:255|confirmed',
        ];
    }
}
