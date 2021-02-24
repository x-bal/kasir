<?php

namespace App\Http\Controllers;

use App\{Barang, Distributor};
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $distributor = Distributor::all();
        return view('barang.create', compact('distributor'));
    }

    public function store()
    {
        request()->validate([
            'nama_barang' => 'required',
            'distributor_id' => 'required',
            'harga_pokok' => 'required',
            'ppn' => 'required',
        ]);

        $input = request()->all();

        Barang::create($input);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
    {
        $distributor = Distributor::all();
        return view('barang.edit', compact('barang', 'distributor'));
    }

    public function update(Request $request, Barang $barang)
    {
        //
    }

    public function destroy(Barang $barang)
    {
        //
    }
}
