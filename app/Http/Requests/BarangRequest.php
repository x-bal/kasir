<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'nama_barang' => 'required',
            'distributor' => 'required',
            'harga_pokok' => 'required',
            'ppn' => 'required',
            'harga_jual' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Nama barang tidak boleh kosong',
            'distributor.required' => 'Pilih distributor',
            'harga_pokok.required' => 'Harga pokok tidak boleh kosong',
            'ppn.required' => 'PPN tidak boleh kosong',
            'harga_jual.required' => 'Harga Jual tidak boleh kosong',
        ];
    }
}
