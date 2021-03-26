@extends('layouts.master', ['title' => 'Edit Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-primary text-light">Edit Transaksi</div>

            <div class="card-body mt-3">
                <form action="{{ route('order.updateTransaksi', $transaksi->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="barang">Barang</label>
                            <select name="barang" id="barang" class="form-control select2">
                                <option disabled selected>-- Pilih barang --</option>
                                @foreach($stok as $stk)
                                <option value="{{ $stk->barang->id }}">{{ $stk->barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                List Order
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Disc</th>
                                <th>Sub Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->barang->nama_barang }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>@rupiah($order->barang->harga_jual)</td>
                                <td>{{ $order->barang->diskon }}</td>
                                <td>@rupiah($order->qty * $order->barang->harga_jual)</td>
                                <td>
                                    <form action="{{ route('order.destroy', $order->id) }}" method="post" style="display: inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                            $total += $order->qty * $order->barang->harga_jual
                            @endphp
                            @empty
                            <p>Tidak ada list order.</p>
                            @endforelse
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td colspan="2">Total : @rupiah($total)</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="total">Total Bayar</label>
                            <input type="number" name="total" id="total" value="{{ $total }}" class="form-control" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="member">Member</label>
                            <select name="member_id" id="member" class="form-control">
                                <option disabled selected>-- Pilih Member --</option>
                                @foreach($members as $member)
                                @if($transaksi->member_id == $member->id)
                                <option value="{{ $member->id }}" selected>{{ $member->nama_member }}</option>
                                @else
                                <option value="{{ $member->id }}">{{ $member->nama_member }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="bayar">Bayar</label>
                            <input type="number" name="bayar" id="bayar" class="form-control" value="{{ $transaksi->bayar }}">
                        </div>
                        <div class="col-md-6">
                            <label for="kembalian">Kembalian</label>
                            <input type="number" name="kembalian" id="kembalian" class="form-control" readonly value="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('footer')

<script>
    $("#bayar").on('keyup', function() {
        var bayar = parseInt($("#bayar").val());
        var total = parseInt($("#total").val());

        var kembalian = bayar - total;
        $("#kembalian").val(kembalian)
    })

    $(document).ready(function() {
        var bayar = parseInt($("#bayar").val());
        var total = parseInt($("#total").val());

        var kembalian = bayar - total;
        $("#kembalian").val(kembalian)
    })
</script>
@stop