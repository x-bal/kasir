@extends('layouts.master', ['title' => 'Data Transaksi'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Data Transaksi</div>

            <div class="card-body mt-3">
                @if(auth()->user()->level == 'admin')
                <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Transaksi</a>
                @endif
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Invoice</th>
                            <th>Kasir</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transaksi as $trx)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trx->created_at }}</td>
                            <td>{{ $trx->invoice }}</td>
                            <td>{{ $trx->user->nama }}</td>
                            <td>@rupiah($trx->total)</td>
                            <td>
                                <a href="{{ route('transaksi.show', $trx->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                @if(auth()->user()->level == 'admin')
                                <a href="{{ route('transaksi.print', $trx->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                                <a href="{{ route('transaksi.edit', $trx->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('transaksi.destroy', $trx->id) }}" method="post" style="display: inline;" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop