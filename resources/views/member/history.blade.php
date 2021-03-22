@extends('layouts.master', ['title' => 'History Transaksi Member'])


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">History Transaksi {{$member->nama_member}}</div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Invoice</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($history as $hst)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hst->created_at }}</td>
                            <td>{{ $hst->invoice }}</td>
                            <td>@rupiah($hst->total)</td>
                            <td><a href="{{ route('transaksi.show', $hst->id) }}" class="btn btn-sm btn-info"><i class="fas fa-arrow-right"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop