@extends('layouts.master', ['title' => 'Detail Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Transaksi</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Invoice</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="invoice" class="form-control" value="{{ $transaksi->invoice }}" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="tangal" class="form-control" value="{{ $transaksi->created_at }}" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Kasir</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="kasir" class="form-control" value="{{ $transaksi->user->nama }}" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Member</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="" class="form-control" value="{{ $transaksi->member ? $transaksi->member->nama_member : '-' }}" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Total</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="invoice" class="form-control" value="@rupiah($transaksi->total)" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Bayar</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="invoice" class="form-control" value="@rupiah($transaksi->bayar)" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label>Kembalian</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="invoice" class="form-control" value="@rupiah($transaksi->kembalian)" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Barang</label>
                                </div>
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                        </tr>
                                        @foreach($transaksi->orders as $order)
                                        <tr>
                                            <td>{{ $order->barang->nama_barang }}</td>
                                            <td>{{ $order->qty}}</td>
                                            <td>@rupiah($order->qty * $order->barang->harga_jual)</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop