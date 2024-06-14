<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }}</title>

    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    @yield('styles')

</head>

<body>
    {{-- bootstrap
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-mountain-city"></i> {{ $title }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('table-point') }}"><i class="fa-solid fa-table"></i>
                    Table</a>
                    </li> --}}
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table"></i> Tabel
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('table-point') }}">Point</a></li>
                            <li><a class="dropdown-item" href="{{ route('table-polyline') }}">Polyline</a></li>
                            <li><a class="dropdown-item" href="{{ route('table-polygon') }}">Polygon</a></li>
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-solid fa-circle-info"></i> Info</a>
                    </li>


                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-file"></i></i>
                            Dashboard</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item">
                            <button class="nav-link text-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
                        </li>
                    </form>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i></i>Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>pemerintahan berada di Kota Klaten, yang merupakan gabungan dari 3 kecamatan Klaten Utara, Klaten Tengah, Klaten Selatan, sekitar 36 km sebelah barat Kota Surakarta. Kabupaten yang berbatasan dengan provinsi Daerah Istimewa Yogyakarta ini memiliki jumlah penduduk sebanyak 1.275.850 jiwa pada tahun 2022 dan mayoritas penduduknya merupakan etnis Jawa.</p>
                    <p>Explore the Beauty of Klaten Regency Tourism menampilkan fitur map terkait persebaran di Kabupaten Klaten . Pengguna dapat menambahkan informasi lokasi wisata dengan 'create point'. Ringkasan seputar jam buka, alamat dan tiket masuk  tersedia melalui tabel 'points'.Berbagai fitur yang disedikan dapat digunakan jika pengguna sudah melakukan login.</p>
                    <p>Devinta Cahaya Putri (22/506129/SV/22075)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
    {{-- leaflet --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    @include('components.toast')
    @yield('script')
</body>

</html>