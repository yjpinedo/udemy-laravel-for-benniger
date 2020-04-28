<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'role_id' => 'required|numeric',  
        ];

        if ($this->get('is_active') == ""){
            $rules = array_merge($rules, ['is_active' => 'required|numeric',]);
        }

        if ($this->get('password') != ""){
            $rules = array_merge($rules, ['password'  => 'string|min:8',]);
        }

        return $rules;
    }
}
