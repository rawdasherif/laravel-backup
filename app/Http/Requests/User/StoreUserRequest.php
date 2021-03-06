<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'required',
            'National_id' => 'unique:users,National_id',
            'email'=> 'required|unique:users,email',
            'password' =>'required|min:6',
        
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Name is Required',
            'password.min' => 'Minimum password character is 6',
            'National_id.unique' => 'National_id must be unique',
            'email.unique' => 'Email must be unique',
            'password.required' => 'Password is Required',
            'Email.required' => 'Email is Required',

        ];
    }
}
