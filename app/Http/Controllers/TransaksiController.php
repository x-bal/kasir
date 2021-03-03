<?php

namespace App\Http\Controllers;

use App\{Barang, Transaksi, Stok, Member};
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $stok = Stok::with('barang')->get();
        $members = Member::get();

        return view('transaksi.create', compact('stok', 'members'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'barangs' => 'required'
        ]);

        $input = request()->all();
        $input['user_id'] = auth()->user()->id;

        $transaksi = Transaksi::create($input);

        $transaksi->barangs()->attach(request('barangs'));

        return back();
    }

    public function show(Transaksi $transaksi)
    {
        //
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function getBarang($id)
    {
        $barang = Barang::findOrFail($id);
        return response($barang);
    }
}
