<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use App\{Barang, Distributor};
use App\Exports\BarangEksport;
use App\Http\Requests\BarangRequest;

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

    public function store(BarangRequest $request)
    {
        $kode = 'BRG' . rand(1000, 9999);
        $input = $request->all();
        $input['kode_barang'] = $kode;
        $input['distributor_id'] = $request->input('distributor');

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

    public function update(BarangRequest $request, Barang $barang)
    {
        $barang->update($request->all());

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
        request()->validate(
            [
                'mulai' => 'required',
                'sampai' => 'required',
            ],
            [
                'mulai.required' => 'Pilih tanggal mulai',
                'sampai.required' => 'Pilih tanggal sampai',
            ]
        );


        $barang = Barang::with('stok', 'distributor')->whereBetween('created_at', [request('mulai'), request('sampai')])->get();
        $pdf = PDF::loadview('barang.generate', ['barang' => $barang, 'mulai' => request('mulai'), 'sampai' => request('sampai')])->setPaper('a4', 'landscape');

        return $pdf->download('Laporan-Stok-Barang.pdf');
    }

    public function export()
    {
        request()->validate(
            [
                'mulai' => 'required',
                'sampai' => 'required',
            ],
            [
                'mulai.required' => 'Pilih tanggal mulai',
                'sampai.required' => 'Pilih tanggal sampai',
            ]
        );

        $barang = Barang::with('stok', 'distributor')->whereBetween('created_at', [request('mulai'), request('sampai')])->get();

        return Excel::download(new BarangEksport('barang.generate', $barang), 'laporan-barang.xlsx');
    }
}
