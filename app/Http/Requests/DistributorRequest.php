<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorRequest extends FormRequest
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
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama_distributor.required' => 'Nama distributor tidak boleh kosong',
            'alamat.required' => 'Nama distributor tidak boleh kosong',
            'telp.required' => 'Nama distributor tidak boleh kosong',
            'telp.numeric' => 'Telp harus berupa angka',
        ];
    }
}
