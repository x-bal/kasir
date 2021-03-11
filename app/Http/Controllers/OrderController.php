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

        Order::create([
            'transaksi_id' => $id,
            'barang_id' => $request->input('barang'),
            'qty' => $request->input('qty'),
        ]);

        return back();
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
}
