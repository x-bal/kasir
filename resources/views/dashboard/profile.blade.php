@extends('layouts.master', ['title' => 'Profile'])

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Profile</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="{{ route('update.profile', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="username" class="form-control" name="username" value="{{ $user->username }}">

                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" id="nama" class="form-control" name="nama" value="{{ $user->nama }}">

                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Jk</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-Laki" {{ $user->jk == 'Laki-Laki' ? 'checked' : '' }}>
                            <label class="form-check-label" for="laki-laki">
                                Laki-Laki
                            </label>
                            <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan" {{ $user->jk == 'Perempuan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>

                            <div>
                                @error('jk')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ $user->alamat }}</textarea>

                            @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Telp</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="number" id="telp" class="form-control" name="telp" value="{{ $user->telp }}">

                            @error('telp')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" id="password" class="form-control" name="password">
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop