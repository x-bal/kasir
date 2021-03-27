@extends('layouts.master', ['title' => 'Laporan Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header bg-primary text-light">Laporan Transaksi</div>

            <div class="card-body mt-3">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="mulai">Mulai</label>
                                <input type="date" name="mulai" id="mulai" class="form-control" value="{{ request('mulai') ? request('mulai') : '' }}">

                                @error('mulai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" name="sampai" id="sampai" class="form-control" value="{{ request('sampai') ? request('sampai') : '' }}">

                                @error('sampai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select name="user" id="user" name="user" class="form-control">
                                    <option disabled selected>-- Pilih User --</option>
                                    <option value="null" {{ request("user") == 'null' ? 'selected' : '' }}>Semua Data</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ request("user") == $user->id ? 'selected' : '' }}>{{ $user->nama }}</option>
                                    @endforeach
                                </select>

                                @error('user')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <button type="submit" class="btn btn-sm btn-primary mt-4">Submit</button>
                            @if($transaksi != 'kosong')
                            <a href="/transaksi/generate/{{ request('mulai') }}/{{ request('sampai') }}/{{ request('user') }}" class="btn btn-sm btn-primary mt-4"><i class="fas fa-download"></i> Download</a>
                            @endif
                        </div>
                    </div>
                </form>

                @if($transaksi != 'kosong')

                <table class="table table-bordered table-striped mt-5" id="table">
                    <thead>
                        <tr class="text-center" style="font-size: 15px;">
                            <th></th>
                            <th width="10">No</th>
                            <th width="100">Tanggal</th>
                            <th width="100">Invoice</th>
                            <th>Kasir</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transaksi as $trx)
                        <tr style="font-size: 14px;">
                            <td></td>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $trx->created_at }}</td>
                            <td>{{ $trx->invoice }}</td>
                            <td>{{ $trx->user->nama }}</td>
                            <td class="text-center">@rupiah($trx->total)</td>
                            <td class="text-center">@rupiah($trx->bayar)</td>
                            <td class="text-center">@rupiah($trx->kembalian)</td>
                        </tr>

                        @php
                        $total += $trx->total;
                        @endphp
                        @endforeach

                        <!-- <tr class="text-center" style="font-size: 15px;">
                            <td></td>
                            <td colspan="4"></td>
                            <td colspan="2">Total Transaksi: </td>
                            <td>@rupiah($total)</td>
                        </tr> -->
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@stop