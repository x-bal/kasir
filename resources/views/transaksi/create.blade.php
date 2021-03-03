@extends('layouts.master', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Transaksi</div>

            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="barang">Nama Barang</label>

                                <select name="barang" id="barang" class="form-control select2">
                                    <option disabled selected>-- Pilih Barang --</option>
                                    @foreach($stok as $stk)
                                    <option value="{{ $stk->barang->id }}">{{ $stk->barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" name="qty" id="qty" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="member">Nama Member</label>
                        <select name="member_id" id="member" class="form-control select2">
                            <option disabled selected>-- Pilih Member --</option>
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->nama_member }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Entri Transaksi</div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="target">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Opsi</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@stop