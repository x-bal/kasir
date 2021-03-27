<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'total.required' => 'Total tidak boleh kosong',
            'bayar.required' => 'Bayar tidak boleh kosong',
            'kembalian.required' => 'Kembalian tidak boleh kosong',
            'kembalian.numeric' => 'Kembalian harus berupa angka',
            'bayar.numeric' => 'Bayar harus berupa angka',
        ];
    }
}
