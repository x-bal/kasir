@extends('layouts.master', ['title' => 'Laporan Stok Barang'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-light">Laporan Stok Barang</div>

            <div class="card-body mt-3">
                <form action="{{route('barang.generate')}}" method="post" id="form">
                    @csrf
                    <div class="form-group">
                        <label for="mulai">Mulai</label>
                        <input type="date" name="mulai" id="mulai" class="form-control">

                        @error('mulai')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="date" name="sampai" id="sampai" class="form-control">

                        @error('sampai')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary" id="pdf"><i class="fas fa-download"></i> Download</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop