<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'nama_member' => 'required',
            'jk' => 'required',
            'telp' => 'required|numeric',
            'alamat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_member.required' => 'Nama member tidak boleh kosong',
            'jk.required' => 'Pilih jenis kelamin',
            'telp.required' => 'Telp tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telp.numeric' => 'Telp harus berupa angka',
        ];
    }
}
