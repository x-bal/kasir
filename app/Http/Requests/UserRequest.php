<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'level' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username tidak tersedia',
            'nama.required' => 'Nama tidak boleh kosong',
            'jk.required' => 'Pilih jenis kelamin',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telp.required' => 'Telp tidak boleh kosong',
            'level.required' => 'Pilih level',
            'telp.numeric' => 'Telp harus berupa angka',
        ];
    }
}
