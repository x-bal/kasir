@extends('layouts.master', ['title' => 'Laporan Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header bg-primary text-light">Laporan Transaksi</div>

            <div class="card-body mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="mulai">Mulai</label>
                                <input type="date" name="mulai" id="mulai" class="form-control" value="{{ request('mulai') ? request('mulai') : '' }}">

                                @error('mulai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" name="sampai" id="sampai" class="form-control" value="{{ request('sampai') ? request('sampai') : '' }}">

                                @error('sampai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <button type="submit" class="btn btn-sm btn-primary mt-4">Submit</button>
                            @if($transaksi != 'kosong')
                            <a href="/barang/generate/{{ request('mulai') }}/{{ request('sampai') }}" class="btn btn-sm btn-primary mt-4"><i class="fas fa-download"></i> Download</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop