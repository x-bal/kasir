@extends('layouts.master', ['title' => 'Data Stok'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Stok</div>

            <div class="card-body">
                <a href="{{ route('stok.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Stok</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Distributor</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($stoks as $stok)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stok->barang->nama_barang }}</td>
                            <td>{{ $stok->barang->distributor->nama_distributor }}</td>
                            <td>{{ $stok->jumlah }}</td>
                            <td>
                                <a href="{{ route('stok.edit', $stok->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('stok.destroy', $stok->id) }}" method="post" style="display: inline;" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
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