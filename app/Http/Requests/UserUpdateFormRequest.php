<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
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
            'nama_user' => 'required','max:255',
            'alamat_user' => 'required|max:255',
            'nohp_user' => 'required|max:15',
            'email_user' => 'required|email|max:255',
        ];
    }
}
