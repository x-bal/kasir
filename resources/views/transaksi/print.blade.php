<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Struk</title>
</head>

<body>

    <div class="row">
        <div class="col-md-4">
            <table>
                <tr>
                    <td colspan="4">
                        <h3 class="text-center" style="font-family: Arial;">Toko Qashir</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p class="text-center">JL.MANGUNREJA N0.150 RT.01 RW.01</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-dark">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><br></td>
                </tr>
                <tr>
                    <td>{{ $transaksi->created_at }}</td>
                    <td></td>
                    <td></td>
                    <td> {{ $transaksi->invoice }}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>

                @foreach($transaksi->orders as $order)
                <tr>
                    <td>{{ $order->barang->nama_barang }}</td>
                    <td class="text-center">{{ $order->qty}}</td>
                    <td class="text-right">@rp($order->barang->harga_jual)</td>
                    <td class="text-right">@rp($order->qty * $order->barang->harga_jual)</td>
                </tr>

                @php
                $total = 0;
                $total += $order->qty * $order->barang->harga_jual;
                @endphp
                @endforeach

                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td class="text-right">Total</td>
                    <td class="text-center">:</td>
                    <td class="text-right"> @rp($total)</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right">Tunai</td>
                    <td class="text-center">:</td>
                    <td class="text-right"> @rp($transaksi->bayar)</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right">Kembali</td>
                    <td class="text-center">:</td>
                    <td class="text-right"> @rp($transaksi->kembalian)</td>
                </tr>
                <tr>
                    <td colspan="4"><br><br><br></td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center">TERIMA KASIH TELAH BERBELANJA</td>
                </tr>

            </table>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>