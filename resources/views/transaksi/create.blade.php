@extends('layouts.master', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Tambah Transaksi</div>

            <div class="card-body">
                <a href="" class="btn btn-sm btn-primary mb-3" style="float: right;">Tambah Baris</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="240">Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Disc</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <td>
                            <select name="barang" id="select-barang" class="form-control select2">
                                <option disabled selected>-- Pilih Barang --</option>
                                @foreach($stok as $stk)
                                <option value="{{ $stk->barang->id }}">{{ $stk->barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="qty" id="qty" class="form-control form-control-sm">
                        </td>
                        <td>
                            <input type="number" disabled name="harga" id="harga" class="form-control form-control-sm">
                        </td>
                        <td>
                            <input type="number" disabled name="disc" id="disc" class="form-control form-control-sm">
                        </td>
                        <td>
                            <input type="number" disabled name="total" id="total" class="form-control form-control-sm">
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                    </tbody>
                </table>

                <!-- <div class="form-group">
                    <label for="member">Nama Member</label>
                    <select name="member_id" id="member" class="form-control select2">
                        <option disabled selected>-- Pilih Member --</option>
                        @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->nama_member }}</option>
                        @endforeach
                    </select>
                </div> -->

                <!-- <button type="button" class="btn btn-sm btn-primary btn-tambah">Tambah</button> -->
                </form>
            </div>
        </div>
    </div>
</div>
@stop