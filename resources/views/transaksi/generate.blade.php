<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <title>Laporan Transaksi</title>
</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center" style="font-family: Arial;">Laporan Transaksi</h3>

            <div class="mt-5">
                <b>Periode : </b>{{ $mulai }} s.d {{$sampai}}
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped">
                <tr class="text-center" style="font-size: 15px;">
                    <th width="10">No</th>
                    <th width="100">Tanggal</th>
                    <th width="100">Invoice</th>
                    <th>Kasir</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                </tr>

                @foreach($transaksi as $trx)
                <tr style="font-size: 14px;">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $trx->created_at }}</td>
                    <td>{{ $trx->invoice }}</td>
                    <td>{{ $trx->user->nama }}</td>
                    <td class="text-center">@rupiah($trx->total)</td>
                    <td class="text-center">@rupiah($trx->bayar)</td>
                    <td class="text-center">@rupiah($trx->kembalian)</td>
                </tr>
                @php
                $total = 0;
                $total += $trx->total;
                @endphp
                @endforeach

                <tr class="text-center" style="font-size: 15px;">
                    <td colspan="4"></td>
                    <td colspan="2">Total Transaksi: </td>
                    <td>@rupiah($total)</td>
                </tr>

            </table>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>