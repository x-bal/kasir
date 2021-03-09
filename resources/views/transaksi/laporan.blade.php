@extends('layouts.master', ['title' => 'Laporan Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Laporan Transaksi</div>

            <div class="card-body">
                <form action="{{ route('transaksi.generate') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option disabled selected>-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Febuari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option disabled selected>-- Pilih Tahun --</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file"></i> Generate</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop