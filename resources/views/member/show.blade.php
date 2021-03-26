@extends('layouts.master', ['title' => 'Detail Member'])

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-primary text-light">{{ $member->nama_member }}</div>

            <div class="card-body mt-3">
                <form class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-5">
                                <label>Kode Member</label>
                            </div>
                            <div class="col-md-7 form-group">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode_member, 'C128')}}" alt="barcode" width="120" /><br>
                                <small style="margin-left: 12px;">{{ $member->kode_member }}</small>
                            </div>
                            <div class="col-md-5">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-md-7 form-group">
                                {{ $member->jk }}
                            </div>
                            <div class="col-md-5">
                                <label>Telp</label>
                            </div>
                            <div class="col-md-7 form-group">
                                {{ $member->telp }}
                            </div>
                            <div class="col-md-5">
                                <label>Alamat</label>
                            </div>
                            <div class="col-md-7 form-group">
                                {{ $member->alamat }}
                            </div>
                            <div class="col-md-5">
                                <label>Diskon</label>
                            </div>
                            <div class="col-md-7 form-group">
                                {{ $member->disc }}%
                            </div>
                            <div class="col-md-5">
                                <label>Bergabung</label>
                            </div>
                            <div class="col-md-7 form-group">
                                {{ \Carbon\Carbon::parse($member->created_at)->format('d F, Y') }}
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop