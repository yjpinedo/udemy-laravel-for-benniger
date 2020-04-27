<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $rules = [
            'name'      => 'required|string|unique:users,name',
            'email'     => 'required|string|email|unique:users,email',
            'role_id'   => 'required|numeric',  
            'password'  => 'required|string|min:8',
            'file'      => 'required'
        ];

        if ($this->get('is_active') == ""){
            $rules = array_merge($rules, ['is_active' => 'required|numeric',]);
        }

        return $rules;
    }
}
