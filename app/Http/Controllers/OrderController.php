<?php

namespace App\Http\Controllers;

use App\{Order, Transaksi,};
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $transaksi = Transaksi::max('id');
        $id = 0;
        if ($transaksi === null) {
            $id++;
        }

        $id = $transaksi + 1;

        request()->validate([
            'barang' => 'required',
            'qty' => 'required'
        ]);

        Order::create([
            'transaksi_id' => $id,
            'barang_id' => request('barang'),
            'qty' => request('qty'),
        ]);

        return back();
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }
}
