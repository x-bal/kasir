@extends('layouts.master', ['title' => 'Tambah Barang'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Tambah Barang</div>

            <div class="card-body mt-3">
                <form action="{{ route('barang.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}">

                                @error('nama_barang')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="distributor">Distributor</label>
                                <select name="distributor" id="distributor" class="choices form-select">
                                    <option disabled selected>-- Pilih Distributor --</option>
                                    @foreach($distributor as $dst)
                                    <option value="{{ $dst->id }}">{{ $dst->nama_distributor }}</option>
                                    @endforeach
                                </select>

                                @error('distributor')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="stok">Jumlah Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}">

                                @error('stok')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary mt-4">Tambah</button>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="harga_pokok">Harga Pokok</label>
                                <input type="number" name="harga_pokok" id="harga_pokok" class="form-control" value="{{ old('harga_pokok') }}">

                                @error('harga_pokok')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ppn">PPN</label>
                                <small class="text-secondary">*(%)</small>
                                <input type="number" name="ppn" id="ppn" class="form-control" value="{{ old('ppn') }}">

                                @error('ppn')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <small class="text-secondary">*(%)</small>
                                <input type="number" name="diskon" id="diskon" class="form-control" value="{{ old('diskon') }}">

                                @error('diskon')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" name="harga_jual" id="harga_jual" class="form-control" readonly>

                                @error('harga_jual')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop