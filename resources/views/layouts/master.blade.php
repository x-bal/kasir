<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Kasir</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('vendors') }}/iconly/bold.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Toastify -->
    <link rel="stylesheet" href="{{ asset('vendors') }}/toastify/toastify.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('vendors') }}/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('vendors') }}/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('vendors') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css') }}/app.css">
    <link rel="shortcut icon" href="{{ asset('images') }}/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}"><img src="{{ asset('images') }}/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class='sidebar-hide d-xl-none d-block'><i class='bi bi-x bi-middle'></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Menu</li>

                        <li class="sidebar-item {{ request()->is('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @if(auth()->user()->level->level == 'admin')
                        <li class="sidebar-item {{ request()->is('users') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class='sidebar-link'>
                                <i class="fas fa-users"></i>
                                <span>Data User</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('distributor') ? 'active' : '' }}">
                            <a href="{{ route('distributor.index') }}" class='sidebar-link'>
                                <i class="fas fa-user-shield"></i>
                                <span>Data Distributor</span>
                            </a>
                        </li>
                        @endif

                        <li class="sidebar-item {{ request()->is('member') ? 'active' : '' }}">
                            <a href="{{ route('member.index') }}" class='sidebar-link'>
                                <i class="fas fa-user-tag"></i>
                                <span>Data Member</span>
                            </a>
                        </li>

                        @if(auth()->user()->level->level == 'admin')
                        <li class="sidebar-item {{ request()->is('barang') ? 'active' : '' }}">
                            <a href="{{ route('barang.index') }}" class='sidebar-link'>
                                <i class="fas fa-store"></i>
                                <span>Data Barang</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('stok') ? 'active' : '' }}">
                            <a href="{{ route('stok.index') }}" class='sidebar-link'>
                                <i class="fas fa-tags"></i>
                                <span>Data Stok</span>
                            </a>
                        </li>
                        @endif
                        <li class="sidebar-item {{ request()->is('transaksi') ? 'active' : '' }}">
                            <a href="{{ route('transaksi.index') }}" class='sidebar-link'>
                                <i class="far fa-credit-card"></i>
                                <span>{{ auth()->user()->level->level == 'admin' ? 'Data Transaksi' : 'Transaksi' }}</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class='sidebar-link'>
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class='mb-3'>
                <a href="#" class='burger-btn d-block d-xl-none'>
                    <i class='bi bi-justify fs-3'></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{ asset('vendors') }}/perfect-scrollbar/perfect-scrollbar.min.js">
    </script>
    <script src="{{ asset('js') }}/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('vendors') }}/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('js') }}/pages/dashboard.js"></script>

    <script src="{{ asset('js') }}/main.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>

    <!-- Toastify -->
    <script src="{{ asset('vendors') }}/toastify/toastify.js"></script>

    <!-- Sweetalert -->
    <script src="{{ asset('vendors') }}/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                        className: 'dtr-control',
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: 1
                    }
                ]
            });

            new $.fn.dataTable.FixedHeader(table);
        });

        $(document).ready(function() {
            $('.select2').select2({
                width: 'resolve'
            });
        });
    </script>

    <script>
        $('.delete-form').on('click', function(e) {
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Hapus data ?',
                text: "Klik hapus untuk menghapus data",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    return form.submit();
                }
            })

        });

        $('#harga_pokok').on('keyup', function() {
            var pokok = $(this).val();

            $("#harga_jual").empty();
            $("#harga_jual").val(pokok);
        })

        $('#ppn').on('keyup', function() {
            var ppn = $(this).val();
            var pokok = parseInt($('#harga_pokok').val());

            var total = ppn * pokok / 100;
            var hargaJual = pokok + total;
            $("#harga_jual").empty();

            $("#harga_jual").val(hargaJual);
        })

        $('#diskon').on('keyup', function() {
            var diskon = $(this).val();
            var pokok = parseInt($("#harga_pokok").val());
            var ppn = parseInt($("#ppn").val());
            // var harga = parseInt($('#harga_jual').val());
            var harga = ppn * pokok / 100;
            var totalHarga = pokok + harga;
            var total = diskon * totalHarga / 100;

            var hargaJual = totalHarga - total;
            $("#harga_jual").empty();

            $("#harga_jual").val(hargaJual);
        });

        $(".target-barang").on('change', function() {
            var idBarang = $(this).val();

            $.ajax({
                url: '/transaksi/getBarang/' + idBarang,
                method: 'get',
                success: function(result) {
                    $("#target").append(`<tr>
                        <td>` + result.nama_barang + `</td>
                        <td>` + result.harga_jual + `</td>
                        <td>` + result.harga_jual + `</td>
                    </tr>`)
                }
            })
        });


        $(".btn-tambah").on('click', function() {
            var idBarang = $("#select-barang").val();
            var qty = $("#qty").val();

            $.ajax({
                url: '/transaksi/getBarang/' + idBarang,
                method: 'get',
                success: function(result) {
                    $("#target").append(`<tr>
                        <td>` + result.nama_barang + `</td>
                        <td>` + result.harga_jual + `</td>
                        <td>` + result.diskon + `</td>
                        <td>` + qty + `</td>
                        <td>` + qty + `</td>
                        <td><button type="button" class="btn btn-sm btn-danger remove"><i class="fas fa-times"></i></button></td>
                    </tr>`);
                }
            })

        });

        $(".add-row").on('click', function() {
            addRow()
        });




        $(".remove").on('click', function() {
            console.log("ok")
        })
    </script>

    @if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
    </script>
    @endif
</body>

</html>