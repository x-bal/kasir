<?php

namespace App\Http\Controllers;

use App\{Barang, Transaksi, Stok, Member, Order};
use Illuminate\Http\Request;
use PDF;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => [
            'create', 'store'
        ]]);
    }

    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $stok = Stok::with('barang')->get();
        $members = Member::get();

        $transaksi = Transaksi::max('id');
        $id = 0;
        if ($transaksi < 1) {
            $id++;
        }

        $id = $transaksi + 1;
        $orders = Order::with('barang')->where('transaksi_id', $id)->get();
        $total = 0;

        return view('transaksi.create', compact('stok', 'members', 'total', 'orders'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'total' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required'
        ]);

        $input = request()->all();
        $inv = 'INV/' . date('dmy') . '/' . rand(10000, 99999);

        $input['user_id'] = auth()->user()->id;
        $input['invoice'] = $inv;

        Transaksi::create($input);
        if (auth()->user()->level->level == 'karyawan') {
            return back()->with('success', 'Transaksi Berhasil');
        }
        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $stok = Stok::with('barang')->get();
        $members = Member::get();

        $orders = Order::with('barang')->where('transaksi_id', $transaksi->id)->get();
        $total = 0;

        return view('transaksi.edit', compact('stok', 'members', 'total', 'orders', 'transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        request()->validate([
            'total' => 'required',
            'bayar' => 'required',
            'kembalian' => 'required'
        ]);

        $input = request()->all();

        $input['user_id'] = auth()->user()->id;

        $transaksi->update($input);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->orders()->delete();
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function print(Transaksi $transaksi)
    {
        $pdf = PDF::loadview('transaksi.print', ['transaksi' => $transaksi]);
        return $pdf->download('struk-pdf.pdf');
    }

    public function laporan()
    {
        return view('transaksi.laporan');
    }

    public function generate()
    {
        $transaksi = Transaksi::with('user')->whereYear('created_at', '=', request('tahun'))->whereMonth('created_at', '=', request('bulan'))->get();
        $pdf = PDF::loadview('transaksi.generate', ['transaksi' => $transaksi]);
        return $pdf->download('struk-pdf.pdf');
    }
}
