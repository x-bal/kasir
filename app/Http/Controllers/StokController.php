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

        Stok::create(request()->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function show(Stok $stok)
    {
        //
    }

    public function edit(Stok $stok)
    {
        //
    }

    public function update(Request $request, Stok $stok)
    {
        //
    }

    public function destroy(Stok $stok)
    {
        //
    }
}
