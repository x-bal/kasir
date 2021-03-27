<?php

namespace App\Http\Controllers;

use App\{Barang, Transaksi, Stok, Member, Order};
use App\Http\Requests\TransaksiRequest;
use PDF;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => [
            'create', 'store', 'index', 'show', 'print', 'struk'
        ]]);
    }

    public function index()
    {
        $transaksi = Transaksi::latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $stok = Stok::with('barang')->where('jumlah', '>', 0)->get();
        $members = Member::get();

        $transaksi = Transaksi::max('id');
        $id = 0;
        if ($transaksi < 1) {
            $id++;
        }

        $id = $transaksi + 1;
        $orders = Order::with('barang')->where([
            ['transaksi_id', $id],
            ['user_id', auth()->user()->id]
        ])->get();
        $total = 0;

        return view('transaksi.create', compact('stok', 'members', 'total', 'orders'));
    }

    public function store(TransaksiRequest $request)
    {

        $input = $request->all();
        $inv = 'INV/' . date('dmy') . '/' . rand(10000, 99999);

        $input['user_id'] = auth()->user()->id;
        $input['invoice'] = $inv;

        $transaksi = Transaksi::create($input);


        $pdf = PDF::loadview('transaksi.print', ['transaksi' => $transaksi]);
        // return $pdf->download('struk-' . $transaksi->invoice . '.pdf');
        return $pdf->stream('struk-' . $transaksi->invoice . '.pdf', ['Attachment' => false]);
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

    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
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
        $pdf = PDF::loadview('transaksi.print', ['transaksi' => $transaksi])->setPaper('a4', 'potrait');
        return $pdf->stream('struk-' . $transaksi->invoice . '.pdf', ['Attachment' => false]);
        // return $pdf->download('struk-' . $transaksi->invoice . '.pdf');
    }

    public function struk(Transaksi $transaksi)
    {
        return view('transaksi.struk', compact('transaksi'));
    }

    public function laporan()
    {
        if (request('mulai')) {
            $transaksi = Transaksi::with('user')->where('created_at', '>=', request('mulai'))->where('created_at', '<=', request('sampai'))->get();
            $total = 0;

            if (count($transaksi) > 0) {
                return view('transaksi.laporan', compact('transaksi'));
            } else {
                $transaksi = 'kosong';
                return view('transaksi.laporan', compact('transaksi'));
            }
        } else {
            $transaksi = 'kosong';
            return view('transaksi.laporan', compact('transaksi'));
        }
        return view('transaksi.laporan');
    }

    public function generate()
    {
        // request()->validate([
        //     'mulai' => 'required',
        //     'sampai' => 'required',
        // ], [
        //     'mulai.required' => 'Pilih tanggal mulai',
        //     'sampai.required' => 'Pilih tanggal sampai',
        // ]);

        $transaksi = Transaksi::with('user')->where('created_at', '>=', request('mulai'))->where('created_at', '<=', request('sampai'))->get();
        $total = 0;

        $pdf = PDF::loadview('transaksi.generate', ['transaksi' => $transaksi, 'mulai' => request('mulai'), 'sampai' => request('sampai'), 'total' => $total])->setPaper('a4', 'landscape');

        return $pdf->download('Laporan-Transaksi-' . request('mulai') . '-' . request('sampai') . '.pdf');
    }
}
