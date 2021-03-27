<?php

namespace App\Http\Controllers;

use App\{Order, Transaksi,};
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $transaksi = Transaksi::max('id');
        $id = 0;
        if ($transaksi === null) {
            $id++;
        }

        $id = $transaksi + 1;
        $attr = [
            'transaksi_id' => $id,
            'barang_id' => $request->input('barang'),
            'user_id' => auth()->user()->id,
        ];
        if (request('qty') == null) {
            $attr['qty'] = 1;
        } else {
            $attr['qty'] = request('qty');
        }

        Order::create($attr);

        return back();
    }

    public function updateTransaksi(Transaksi $transaksi)
    {
        // $input = request()->all();
        $input['barang_id'] = request('barang');
        $input['qty'] = request('qty');

        $orders = Order::where('transaksi_id', $transaksi->id)->first();
        if ($orders->transaksi_id == $transaksi->id) {
            Order::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => request('barang'),
                'qty' => request('qty'),
            ]);
        }

        return back();
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
}
