<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
</head>

<body>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

    <div class="container" style=" margin: 20px">
        <div class="row">
            <div class="col-md-4">
                <table>
                    <tr>
                        <td colspan="4" style="text-align: center;">
                            <h3 class="text-center" style="font-size: 28px;">Toko Qashir</h3>
                            <p class="text-center">JL.MANGUNREJA N0.150 RT.01 RW.01</p>
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
                        <td style="text-align: center;">{{ $order->qty}}</td>
                        <td style="text-align: end;">@rp($order->barang->harga_jual)</td>
                        <td style="text-align: end;">@rp($order->qty * $order->barang->harga_jual)</td>
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
                        <td style="text-align: center;">:</td>
                        <td style="text-align: end;"> @rp($total)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right">Tunai</td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: end;"> @rp($transaksi->bayar)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right">Kembali</td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: end;">@rp($transaksi->kembalian)</td>
                    </tr>
                    <tr>
                        <td colspan="4"><br><br><br></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center;">TERIMA KASIH TELAH BERBELANJA</td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="row">
            <button type="submit" id="print">Print</button>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script>
        $("#print").on('click', function() {
            document.location.href = "{{ route('transaksi.print', $transaksi->id) }}"
        })
    </script>
</body>

</html>