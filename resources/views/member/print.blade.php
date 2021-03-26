<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Print Member</title>
</head>

<body>

    <div class="container" style="font-family:  Helvetica, sans-serif;">

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-light" style="height: 80px; background-color: #435ebe;">
                        <div class="d-flex justify-content-between mt-4">
                            {{ $member->nama_member }}
                            <img src="{{ asset('images') }}/logo/logos.png" alt="Logo" width="100" height="30">
                        </div>
                    </div>

                    <div class="card-body mt-3 text-dark" style="height: 258px;">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Kode Member</label>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode_member, 'C128')}}" alt="barcode" width="120" /><br>
                                        <small style="margin-left: 12px;">{{ $member->kode_member }}</small>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        {{ $member->jk }}
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Telp</label>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        {{ $member->telp }}
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-6 form-group mb-2">
                                        {{ $member->alamat }}
                                    </div>
                                    <div class="col-md-6">
                                        <label>Diskon</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        {{ $member->disc }}%
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4 form-group text-white mt-3" style="z-index: 1;">
                                        {{ \Carbon\Carbon::parse($member->created_at)->format('d F, Y') }}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <svg style="margin-top: -130px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#435ebe" fill-opacity="1" d="M0,288L1440,128L1440,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-light d-flex justify-content-between" style="height: 80px;background-color: #435ebe;">

                    </div>

                    <div class="card-body mt-3 text-center" style="height: 258px;">
                        <img src="{{ asset('images') }}/logo/logo.png" alt="Logo" width="300" class="mt-5" style="opacity: .5;">
                    </div>
                    <svg style="margin-top: -130px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#435ebe" fill-opacity="1" d="M0,288L1440,128L1440,320L0,320Z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>