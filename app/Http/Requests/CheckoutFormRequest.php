<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutFormRequest extends FormRequest
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
            'nama'=>'min:5|required|regex:/^[\pL\s\-]+$/u|max:255',
            'provinsi'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
            'kabupaten'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
            'kecamatan'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
            'alamat'=>'required|min:12',
            'kodepos'=>'required|digits_between:4,8',
            'telp'=>'required|digits_between:10,13'
        ];
    }
}
