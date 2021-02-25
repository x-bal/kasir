@extends('layouts.master', ['title' => 'Tambah Stok'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Stok</div>

            <div class="card-body">
                <form action="{{ route('stok.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <select name="barang_id" id="distributor" class="choices form-select">
                            <option disabled selected>-- Pilih Barang --</option>
                            @foreach($barang as $brg)
                            <option value="{{ $brg->id }}">{{ $brg->nama_barang }} ({{$brg->distributor->nama_distributor}})</option>
                            @endforeach
                        </select>

                        @error('barang_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control">

                        @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop