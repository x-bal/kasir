@extends('layouts.master', ['title' => 'Data Distributor'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Distributor</div>

            <div class="card-body">
                <a href="{{ route('distributor.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Distributor</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($distributor as $distri)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $distri->nama_distributor }}</td>
                            <td>{{ $distri->alamat }}</td>
                            <td>{{ $distri->telp }}</td>
                            <td>
                                <a href="{{ route('distributor.edit', $distri->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('distributor.destroy', $distri->id) }}" method="post" style="display: inline;" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <p>Tidak ada data distributor</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop