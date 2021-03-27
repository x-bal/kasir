@extends('layouts.master', ['title' => 'Tambah Member'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-light">Tambah Member</div>

            <div class="card-body mt-3">
                <form action="{{ route('member.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="member">Nama Member</label>
                        <input type="text" name="nama_member" id="member" class="form-control" value="{{ old('nama_member') }}">

                        @error('nama_member')
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
                        <label for="telp">Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="{{ old('number') }}">

                        @error('telp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ old('alamat') }}</textarea>

                        @error('alamat')
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