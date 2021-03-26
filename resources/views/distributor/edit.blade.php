@extends('layouts.master', ['title' => 'Edit Distributor'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-light">Edit Distributor</div>

            <div class="card-body mt-3">
                <form action="{{ route('distributor.update', $distributor->id) }}" method="post">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="nama_distributor">Nama Distributor</label>
                        <input type="text" name="nama_distributor" id="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}">

                        @error('nama_distributor')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ $distributor->alamat }}</textarea>

                        @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="{{ $distributor->telp }}">

                        @error('telp')
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