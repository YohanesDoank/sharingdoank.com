<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class validasiLogin extends Request
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
            'name' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required'  =>'harus Isi emailnya',
            'name.email' => 'format bukan email',
            'password.required' => 'password tidak boleh kosong'
        ];
    }
}
