@extends('layouts.master', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Tambah Transaksi</div>

            <div class="card-body">
                <table class="table table-bordered tale-striped">
                    <thead>
                        <tr>
                            <th width="240">Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Disc</th>
                            <th>Total</th>
                            <th><a href="#" class="add-row"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>

                    <tbody id="target">
                        <tr>
                            <td>
                                <select name="barang" id="select-barang" class="form-control select2">
                                    <option disabled selected>-- Pilih barang --</option>
                                    @foreach($stok as $stk)
                                    <option value="{{ $stk->barang->id }}">{{ $stk->barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="qty" id="qty" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="harga" id="harga" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="number" name="dis" id="dis" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="number" name="total" id="total" class="form-control" disabled>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm remove"><i class="fas fa-times"></i></a>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-sm btn-primary btn-tambah">Tambah</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">

    </div>
</div>
@stop