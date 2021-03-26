@extends('layouts.master', ['title' => 'Laporan Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header bg-primary text-light">Laporan Transaksi</div>

            <div class="card-body mt-3">
                <form action="{{ route('transaksi.generate') }}" method="post">
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

                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop