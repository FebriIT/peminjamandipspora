<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>DISPORA OKI SUMSEL</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo.png') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('js/jquery.dataTables.min.css') }}">
    <style>
        .bg-utama{
        background-image: url("/img/dispora.jpg");
        background-size: cover;
        background-position: center;
        height: 50%;
        }
    </style>

</head>

<body class="bg-utama">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.include._navbar')
            @include('layouts.include._sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">

                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Barang</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $barang }}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Transaksi</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $transaksi }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>



    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>



    @yield('js')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
            $('#datatransaksi').DataTable({
                "order":[[6,"asc"]]
            });
        });

        @if(Session::has('sukses')){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get("sukses") }}'
            })
        }
        @endif

    </script>
</body>

</html>


