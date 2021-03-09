@extends('layouts.master', ['title' => 'Data Barang'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Barang</div>

            <div class="card-body">
                <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Barang</a>
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Pokok</th>
                            <th>PPN</th>
                            <th>Diskon</th>
                            <th>Harga Jual</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($barang as $brg)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brg->kode_barang }}</td>
                            <td>{{ $brg->nama_barang }}</td>
                            <td>@rupiah($brg->harga_pokok)</td>
                            <td>{{ $brg->ppn }}%</td>
                            <td>{{ $brg->diskon }}</td>
                            <td>@rupiah($brg->harga_jual)</td>
                            <td>
                                <a href="{{ route('barang.edit', $brg->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('barang.destroy', $brg->id) }}" method="post" style="display: inline;" class="delete-form">
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