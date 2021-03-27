@extends('layouts.master', ['title' => 'Laporan Stok Barang'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Laporan Stok Barang</div>

            <div class="card-body mt-3">
                <form action="" method="post" id="form">
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
                            @if($barang != 'kosong')
                            <a href="/barang/generate/{{ request('mulai') }}/{{ request('sampai') }}" class="btn btn-sm btn-primary mt-4"><i class="fas fa-download"></i> Download</a>
                            @endif
                        </div>
                    </div>
                </form>
                @if($barang != 'kosong')

                <table class="table table-bordered table-striped mt-5" id="table">
                    <thead>
                        <tr class="text-center" style="font-size: 15px;">
                            <th></th>
                            <th width="9">No.</th>
                            <th width="100">Kode Barang</th>
                            <th class="text-left" width="170">Nama Barang</th>
                            <th>Distributor</th>
                            <th width="9">Stok</th>
                            <th>Harga Pokok</th>
                            <th width="10">PPN</th>
                            <th width="10">Disc</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($barang as $brg)
                        <tr>
                            <td></td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $brg->kode_barang }}</td>
                            <td>{{ $brg->nama_barang }}</td>
                            <td class="text-center">{{ $brg->distributor->nama_distributor }}</td>
                            <td class="text-center">{{ $brg->stok->jumlah }}</td>
                            <td class="text-center">@rupiah($brg->harga_pokok )</td>
                            <td class="text-center">{{ $brg->ppn }}%</td>
                            <td class="text-center">{{ $brg->diskon }}%</td>
                            <td class="text-center">@rupiah($brg->harga_jual)</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@stop