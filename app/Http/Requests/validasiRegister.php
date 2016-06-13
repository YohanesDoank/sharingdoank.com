<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validasiRegister extends Request
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
            'username' => 'email|required',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'username-reqired' => 'harus mengisi Email',
            'username.email' => 'format Bukan Email',
            'password.reqired' => 'harus mengisi Passworwd'
        ];
    }
}
