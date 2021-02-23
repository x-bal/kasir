@extends('layouts.master', ['title' => 'Tambah User'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah User</div>

            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">

                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label><br>
                        <input class="form-check-input" type="radio" name="jk" id="lk" value="Laki-Laki">
                        <label class="form-check-label" for="lk">
                            Laki-Laki
                        </label>
                        <input class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan">
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
                        <textarea name="alamat" id="alamat" rows="4" class="form-control"></textarea>

                        @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control">

                        @error('telp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level_id" id="level_id" class="form-control">
                            <option disabled selected>-- Pilih Level --</option>
                            @foreach($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endforeach
                        </select>

                        @error('level_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop