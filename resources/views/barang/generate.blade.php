<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <title>Laporan Stok Barang</title>
</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center" style="font-family: Arial;">Laporan Stok Barang</h3>

            <div class="mt-5">
                <b>Periode : </b> {{ $mulai }} s.d {{ $sampai }}<br>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped">
                <tr class="text-center" style="font-size: 15px;">
                    <th width="9">No.</th>
                    <th width="100">Kode Barang</th>
                    <th width="170">Nama Barang</th>
                    <th>Distributor</th>
                    <th width="9">Stok</th>
                    <th>Harga Pokok</th>
                    <th width="10">PPN</th>
                    <th width="10">Disc</th>
                    <th>Harga Jual</th>
                </tr>

                @foreach($barang as $brg)
                <tr style="font-size: 14px;">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $brg->kode_barang }}</td>
                    <td>{{ $brg->nama_barang }}</td>
                    <td class="text-center">{{ $brg->distributor->nama_distributor }}</td>
                    <td class="text-center">{{ $brg->stok->jumlah }}</td>
                    <td class="text-center">@rupiah($brg->harga_pokok )</td>
                    <td class="text-center">{{ $brg->ppn }}%</td>
                    <td class="text-center">{{ $brg->diskon }}%</td>
                    <td class="text-center">@rupiah($brg->harga_jual)</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>