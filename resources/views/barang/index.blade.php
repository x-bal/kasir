@extends('layouts.master', ['title' => 'Data Barang'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-light">Data Barang</div>

            <div class="card-body mt-3">
                <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Barang</a>
                <a href="{{ route('barang.printCode') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-print"></i> Print Barcode</a>
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <!-- <th>Kode Barang</th> -->
                            <th style="width: 100px;" class="text-center">Barcode</th>
                            <th>Nama Barang</th>
                            <th>Harga Pokok</th>
                            <th class="text-center">PPN</th>
                            <th class="text-center">Disc</th>
                            <th>Harga Jual</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($barang as $brg)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <!-- <td>{{ $brg->kode_barang }}</td> -->
                            <td class="text-center text-dark">
                                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($brg->kode_barang, 'C128')}}" alt="barcode" width="120" />
                                <small style="font-size: 11px;">{{ $brg->kode_barang }}</small>
                            </td>
                            <td>{{ $brg->nama_barang }}</td>
                            <td>@rupiah($brg->harga_pokok)</td>
                            <td class="text-center">{{ $brg->ppn }}%</td>
                            <td class="text-center">{{ $brg->diskon }}%</td>
                            <td>@rupiah($brg->harga_jual)</td>
                            <td style="display: inline-flex;">
                                <a href="{{ route('barang.edit', $brg->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('barang.print', $brg->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-print"></i></a>
                                <form action="{{ route('barang.destroy', $brg->id) }}" method="post" style="display: inline;" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop