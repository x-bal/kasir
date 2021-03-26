<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Member - Kasir</title>

    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


    <link rel="stylesheet" href="{{ asset('css') }}/app.css">
    <link rel="shortcut icon" href="{{ asset('images') }}/favicon.svg" type="image/x-icon">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-light d-flex justify-content-between">
                        {{ $member->nama_member }}
                        <img src="{{ asset('images') }}/logo/logos.png" alt="Logo" width="100">
                    </div>

                    <div class="card-body mt-3 text-dark">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Kode Member</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($member->kode_member, 'C128')}}" alt="barcode" width="120" /><br>
                                        <small style="margin-left: 12px;">{{ $member->kode_member }}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        {{ $member->jk }}
                                    </div>
                                    <div class="col-md-6">
                                        <label>Telp</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        {{ $member->telp }}
                                    </div>
                                    <div class="col-md-6">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-6 form-group">
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
                                    <div class="col-md-4 form-group text-white" style="z-index: 1;">
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
                    <div class="card-header bg-primary text-light d-flex justify-content-between" style="height: 80px;">

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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{ asset('vendors') }}/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js') }}/pages/dashboard.js"></script>

    <script src="{{ asset('js') }}/main.js"></script>

    <script>

    </script>
</body>

</html>