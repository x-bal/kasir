<?php

namespace App\Http\Controllers;

use App\{Stok, Barang};
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        request()->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);

        $input = request()->except('_token');
        Stok::updateOrCreate(
            [
                'barang_id' => $input['barang_id']
            ],
            [
                'jumlah' => $input['jumlah']
            ]
        );

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

    public function update(Request $request, Stok $stok)
    {
        request()->validate([
            'barang_id' => 'required',
            'jumlah' => 'required',
        ]);

        $stok->update(request()->all());
        return redirect()->route('stok.index')->with('success', 'Stok berhasil diupdate');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus');
    }
}
