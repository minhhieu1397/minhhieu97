<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => 'required|email|unique:users|unique:admins',         
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'description' => 'required',
            'role' => 'required',
        ];
    }
}
