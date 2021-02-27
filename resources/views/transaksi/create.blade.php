@extends('layouts.master', ['title' => 'Tambah Transaksi'])

@section('content')
<div class="row">
    @foreach($barang as $brg)
    <div class="col-md-3">
        <div class="card">
            <div class="card-content">
                <img class="card-img-top img-fluid bg-primary py-3" src="{{ asset('images') }}/samples/shopping-bag.svg" alt="Card image cap" style="height: 7rem; max-width: 12rem;">
                <div class="card-body">
                    <h4 class="card-title">{{ $brg->nama_barang }}</h4>
                    <button class="btn btn-sm btn-primary block">@rupiah($brg->harga_jual)</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop