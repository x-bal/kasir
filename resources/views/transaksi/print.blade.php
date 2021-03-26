<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Struk</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <table>
                    <tr>
                        <td colspan="5"><img src="{{ asset('images') }}/logo/MyCash.png" alt="Logo" srcset=""> </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Jl. Mangunreja No. 01
                        </td>
                        <td colspan="3" class="text-right">
                            {{ $transaksi->invoice }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Telp. 0897654763742
                        </td>
                        <td colspan="3" class="text-right">
                            {{ $transaksi->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>

                    <tr>
                        <td>Nama Barang</td>
                        <td class="text-center">Qty</td>
                        <td class="text-center">Disc</td>
                        <td class="text-right">Harga</td>
                        <td class="text-right">Total</td>
                    </tr>
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>
                    @php
                    $total = 0;
                    $item = 0;
                    @endphp
                    @foreach($transaksi->orders as $order)
                    <tr>
                        <td>{{ $order->barang->nama_barang }}</td>
                        <td class="text-center">{{ $order->qty}}</td>
                        <td class="text-center">{{ $order->diskon ? $order->harga_pokok * $order->diskon / 100 : 0 }}</td>
                        <td class="text-right">@rp($order->barang->harga_jual)</td>
                        <td class="text-right">@rp($order->qty * $order->barang->harga_jual)</td>
                    </tr>

                    @php
                    $total += $order->qty * $order->barang->harga_jual;
                    $item += $order->qty
                    @endphp
                    @endforeach
                    @if($transaksi->member)
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>

                    <tr>
                        <td class="text-left">Diskon Member</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td></td>
                        <td class="text-right">{{ $transaksi->member->disc }}%</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>

                    <tr>
                        <td class="text-left">Total</td>
                        <td>{{ $item }} item(s)</td>
                        <td class="text-center">:</td>
                        <td></td>
                        <td class="text-right">Rp. @rp($transaksi->total)</td>
                    </tr>
                    <tr>
                        <td class="text-left">Tunai</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td></td>
                        <td class="text-right">Rp. @rp($transaksi->bayar)</td>
                    </tr>
                    <tr>
                        <td class="text-left">Kembali</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td></td>
                        <td class="text-right">Rp. @rp($transaksi->kembalian)</td>
                    </tr>
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>
                    <tr>
                        <td class="text-left">Kasir</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td></td>
                        <td class="text-right">{{ $transaksi->user->nama }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">-----------------------------------------------------------------------------------------------------</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">
                            <p class="mt-5">
                                Terima Kasih Atas Kunjungan Anda <br>
                                Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan <br>
                            </p>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <!-- <div class="row justify-content-center">
            <div class="col-lg-12">
                <table>
                    <tr>
                        <td colspan="4">
                            <h2 class="text-center" style="font-family: Arial; font-size: 28px; font-weight: bold;">Toko Qashir</h2>
                            <p class="text-center" style="margin-top: -10px;">JL.MANGUNREJA N0.150 RT.01 RW.01</p>
                            <hr>
                        </td>
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
                        <td class="text-left">Total</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td class="text-right"> @rp($total)</td>
                    </tr>
                    <tr>
                        <td class="text-left">Tunai</td>
                        <td></td>
                        <td class="text-center">:</td>
                        <td class="text-right"> @rp($transaksi->bayar)</td>
                    </tr>
                    <tr>
                        <td class="text-left">Kembali</td>
                        <td></td>
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
        </div> -->
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>