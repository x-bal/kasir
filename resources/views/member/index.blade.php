@extends('layouts.master', ['title' => 'Data Member'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Member</div>

            <div class="card-body">
                <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Member</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->nama_member }}</td>
                            <td>{{ $member->jk }}</td>
                            <td>{{ $member->alamat }}</td>
                            <td>{{ $member->telp }}</td>
                            <td>
                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('member.destroy', $member->id) }}" method="post" style="display: inline;" class="delete-form">
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