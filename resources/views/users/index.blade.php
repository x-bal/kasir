@extends('layouts.master', ['title' => 'Data User'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Data User</div>

            <div class="card-body mt-3">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary mb-3">Tambah User</a>
                <a href="{{ route('users.generate') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-download"></i> Download</a>
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->telp }}</td>
                            <td><span class="badge {{ $user->level == 'admin' ? 'bg-primary' : 'bg-success' }}">{{ $user->level }}</span></td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;" class="delete-form">
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