@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5>Selamat Datang, {{ auth()->user()->nama }}</h5>
                <p>Have a nice day :)</p>
            </div>
        </div>
    </div>
</div>
@if(auth()->user()->level == 'admin')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple text-white">
                                    <i class='fas fa-users'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Users</h6>
                                <h6 class='font-extrabold mb-0'>{{ $user }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue text-white">
                                    <i class='fas fa-user-tag'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Member</h6>
                                <h6 class='font-extrabold mb-0'>{{ $member }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green text-white">
                                    <i class='fas fa-user-shield'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Distributor</h6>
                                <h6 class='font-extrabold mb-0'>{{ $distributor }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red text-white">
                                    <i class='fas fa-store'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Barang</h6>
                                <h6 class='font-extrabold mb-0'>{{ $barang }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<!-- <div class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-6 col-lg-2 col-md-6">
                <div class="card">
                    <div class="card-body py-4-5">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="stats-icon purple text-white">
                                    <i class='fas fa-users'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue text-white">
                                    <i class='fas fa-user-tag'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Total Member</h6>
                                <h6 class='font-extrabold mb-0'>{{ $member }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green text-white">
                                    <i class='fas fa-user-shield'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Distributor</h6>
                                <h6 class='font-extrabold mb-0'>{{ $distributor }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red text-white">
                                    <i class='fas fa-store'></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Barang</h6>
                                <h6 class='font-extrabold mb-0'>{{ $barang }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endif
@stop