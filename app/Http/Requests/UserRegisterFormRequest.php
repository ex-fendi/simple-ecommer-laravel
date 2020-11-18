<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nohp_user' => 'required|max:15|unique:tbl_detailuser',
            'email_user' => 'required|email|max:255|unique:tbl_detailuser',
            'password' => 'required|min:6'
        ];
    }
}
