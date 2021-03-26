@extends('layouts.master', ['title' => 'Edit Stok'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-light">Edit Stok</div>

            <div class="card-body mt-3">
                <form action="{{ route('stok.update', $stok->id) }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="barang">Nama Barang</label>
                        <select name="barang" id="distributor" class="choices form-select">
                            @foreach($barang as $brg)
                            @if($stok->barang_id == $brg->id)
                            <option selected value="{{ $brg->id }}">{{ $brg->nama_barang }} ({{$brg->distributor->nama_distributor}})</option>
                            @else
                            <option value="{{ $brg->id }}">{{ $brg->nama_barang }} ({{$brg->distributor->nama_distributor}})</option>
                            @endif
                            @endforeach
                        </select>

                        @error('barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $stok->jumlah }}">

                        @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop