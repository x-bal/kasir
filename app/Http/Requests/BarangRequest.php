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
            'harga_pokok' => 'required|numeric',
            'ppn' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
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
            'stok.required' => 'Harga Jual tidak boleh kosong',
            'stok.numeric' => 'Stok harus berupa angka',
            'harga_pokok.numeric' => 'Harga pokok harus berupa angka',
            'ppn.numeric' => 'PPN harus berupa angka',
            'harga_jual.numeric' => 'Harga Jual harus berupa angka',
        ];
    }
}
