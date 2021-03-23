<?php

namespace App\Http\Controllers;

use App\{Stok, Barang};
use App\Http\Requests\StokRequest;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with('barang')->get();
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('stok.create', compact('barang'));
    }

    public function store(StokRequest $request)
    {
        $input = $request->except('_token');
        $input['barang_id'] = $request->input('barang');
        Stok::create($input);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function show(Stok $stok)
    {
        //
    }

    public function edit(Stok $stok)
    {
        $barang = Barang::all();
        return view('stok.edit', compact('barang', 'stok'));
    }

    public function update(StokRequest $request, Stok $stok)
    {
        $stok->update($request->all());
        return redirect()->route('stok.index')->with('success', 'Stok berhasil diupdate');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus');
    }
}
