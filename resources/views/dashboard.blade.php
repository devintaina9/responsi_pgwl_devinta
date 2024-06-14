<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    </div>

    <!-- Carousel Gambar di Bagian Atas -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div id="dataCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/klatenku.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/petawisata.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/grafikpengunjung.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/wisatadashboard.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#dataCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#dataCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Script Text Section -->
    <div class="container mb-4">
        <div class="row">
            <div class="col text-center">
                <h1 class="welcome-title">Selamat Datang di WEBGIS  Explore the Beauty of Klaten Regency Tourism
                </h1>
                <p class="welcome-subtitle">Informasi terbaru seputar destinasi wisata, tiket masuk, jam buka, alamat lokasi wisata, statistik pengunjung, peta interaktif dan berbagai kegiatan yang dapat dilakukan wisatawan Kabupaten Klaten tersedia di sini. Tujuan pembuatan WEBGIS  Explore the Beauty of Klaten Regency Tourism dilatar belakangi karena Kabupaten Klaten menjadi slaah satu kabupaten di Jawa Tengah yang kurang terkenal secara wisatanya, tetapi memiliki potensi wisata yang perlu ditingkatkan. WEBGIS ini diharapkan menjadi ajang untuk menarik perhatian para khalayak umum agar tertatik mengunjungi berbagai wisata di Kabupaten Klaten. Tujuan disediakan jumlah pengunjung ialah untuk memperlihatkan kepada pengguna terkait jumlah wisata di Klaten, selain itu disajikan peta tematik wisata Klaten yang diterbitkan oleh Kabupaten Klaten berfungsi untuk memperjelas kepada pengguna terkait titik wisata di Kabupaten Klaten bersinar.
                </p>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Seputar Wisata Klaten</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">
                            <h4><i class="fa-solid fa-location-pin"></i> Total Points</h4>              
                            <p style="font-size: 28pt">{{$Total_points}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            <h4><i class="fa-solid fa-draw-polygon"></i> Total Polygons</h4>              
                            <p style="font-size: 28pt">{{$Total_polygons}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="alert alert-info" role="alert">
                            <h4><i class="fa-solid fa-lines-leaning"></i> Total Polylines</h4>              
                            <p style="font-size: 28pt">{{$Total_polylines}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <p>Anda login sebagai <b>{{Auth::user()->name}}</b> dengan email: <i>{{Auth::user()->email}}</i></p>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .welcome-title {
        font-size: 2.5rem; /* Adjust the size as needed */
    }

    .welcome-subtitle {
        font-size: 1.5rem; /* Adjust the size as needed */
    }
</style>