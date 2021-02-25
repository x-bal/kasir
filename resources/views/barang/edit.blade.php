@extends('layouts.master', ['title' => 'Edit Barang'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Barang</div>

            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">

                        @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="distributor">Distributor</label>
                        <select name="distributor_id" id="distributor" class="choices form-select">
                            <option disabled>-- Pilih Distributor --</option>
                            @foreach($distributor as $dst)
                            @if($dst->id == $barang->distributor_id)
                            <option selected value="{{ $dst->id }}">{{ $dst->nama_distributor }}</option>
                            @else
                            <option value="{{ $dst->id }}">{{ $dst->nama_distributor }}</option>
                            @endif
                            @endforeach
                        </select>

                        @error('distributor_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_pokok">Harga Pokok</label>
                        <input type="number" name="harga_pokok" id="harga_pokok" class="form-control" value="{{ $barang->harga_pokok }}">

                        @error('harga_pokok')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ppn">PPN</label>
                        <small class="text-secondary">*(%)</small>
                        <input type="number" name="ppn" id="ppn" class="form-control" value="{{ $barang->ppn }}">

                        @error('ppn')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <small class="text-secondary">*(%)</small>
                        <input type="number" name="diskon" id="diskon" class="form-control" value="{{ $barang->diskon }}">

                        @error('diskon')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ $barang->harga_jual }}" readonly>

                        @error('harga_jual')
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