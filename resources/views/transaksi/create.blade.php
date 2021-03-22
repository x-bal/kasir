@extends('layouts.master', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">Tambah Transaksi</div>

            <div class="card-body">
                <form action="{{ route('order.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <select name="barang" id="barang" class="form-control select2">
                            <option disabled selected>-- Pilih barang --</option>
                            @foreach($stok as $stk)
                            <option value="{{ $stk->barang->id }}">{{ $stk->barang->kode_barang }} | {{ $stk->barang->nama_barang }}</option>
                            @endforeach
                        </select>

                        @error('barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control">

                        @error('qty')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary btn-tambah">Tambah</button>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-8">
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
                            <tr>
                                <td colspan="7">
                                    <p class="text-center">Tidak ada list order.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="total">Total Bayar</label>
                            <input type="number" name="total" id="total" value="{{ $total }}" class="form-control" readonly>

                            @error('total')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="member">Member</label>
                            <select name="member_id" id="member" class="form-control select2">
                                <option disabled selected>-- Pilih Member --</option>
                                @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->nama_member }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="bayar">Bayar</label>
                            <input type="number" name="bayar" id="bayar" class="form-control">

                            @error('bayar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="kembalian">Kembalian</label>
                            <input type="number" name="kembalian" id="kembalian" class="form-control" readonly>

                            @error('kembalian')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10">

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
    });

    $("#member").on('change', function() {
        var id = $(this).val();

        $.ajax({
            method: 'GET',
            url: '/member/get/' + id,
            success: function(result) {
                var total = parseInt($("#total").val());
                var disc = parseInt(result.disc);

                var totalDisc = (total * disc) / 100;

                var all = Math.round(total - totalDisc);

                $("#total").empty();
                $("#total").val(all);
            }
        })
    })

    const select = $('.select2').select2();

    if ($('#barang').hasClass("select2-hidden-accessible")) {
        $('#barang').select2('open');
    }
    $("#barang").on("focus", function() {
        $example.select2("open");
    });
</script>
@stop