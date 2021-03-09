<?php

namespace App\Http\Controllers;

use App\{Barang, Distributor};

use PDF;

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

        $kode = 'BRG' . rand(1000, 9999);
        $input = request()->all();
        $input['kode_barang'] = $kode;

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

    public function update(Barang $barang)
    {
        request()->validate([
            'nama_barang' => 'required',
            'distributor_id' => 'required',
            'harga_pokok' => 'required',
            'ppn' => 'required',
        ]);

        $input = request()->all();

        $barang->update($input);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }

    public function laporan()
    {
        return view('barang.laporan');
    }

    public function generate()
    {
        $barang = Barang::with('stok', 'distributor')->whereYear('created_at', '=', request('tahun'))->whereMonth('created_at', '=', request('bulan'))->get();
        $pdf = PDF::loadview('barang.generate', ['barang' => $barang]);

        return $pdf->download('Laporan-Stok-Barang.pdf');
    }
}
