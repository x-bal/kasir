@extends('layouts.master', ['title' => 'Edit User'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit User</div>

            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ $user['username'] }}">

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $user['nama'] }}">

                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label><br>
                        <input {{ $user->jk == 'Laki-Laki' ? 'checked' : '' }} class="form-check-input" type="radio" name="jk" id="lk" value="Laki-Laki">
                        <label class="form-check-label" for="lk">
                            Laki-Laki
                        </label>
                        <input {{ $user->jk == 'Perempuan' ? 'checked' : '' }} class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan">
                        <label class="form-check-label" for="pr">
                            Perempuan
                        </label>
                        <br>

                        @error('jk')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ $user->alamat }}</textarea>

                        @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="{{ $user->telp }}">

                        @error('telp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            @foreach($levels as $level)
                            @if($user->level_id == $level->id)
                            <option selected value="{{ $level->id }}">{{ $level->level }}</option>
                            @else
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endif
                            @endforeach
                        </select>

                        @error('level')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop