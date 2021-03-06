@extends('layouts.master', ['title' => 'Data Distributor'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Data Distributor</div>

            <div class="card-body mt-3">
                <a href="{{ route('distributor.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Distributor</a>
                <table class="table table-bordered table-striped" id="table">
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
                        @foreach($distributor as $distri)
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop