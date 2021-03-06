<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StokRequest extends FormRequest
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
            'barang' => 'required',
            'jumlah' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'barang.required' => 'Pilih barang',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.numeric' => 'Jumlah harus berupa angka',
        ];
    }
}
