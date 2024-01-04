<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('build/assets/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Tambahkan link CSS DataTables -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Register</title>
</head>

<body>
    @foreach ($wisatas as $wisata)

    <div class="h-50 position-relative" style="background-image: url({{ asset('storage/' . $wisata->image) }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <nav class="navbar navbar-expand-lg bg-transparant">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="img/Logo.png" alt="" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex" id="navbarNav">
                    @auth
                <div class="dropdown">
                    <button class="btn dropdown-toggle bg-transparent text-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">Login</a>
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}" style="color: white;">Register</a>
                    @endif
                @endauth
                </div>
            </div>
        </nav>
    </div>

    <!-- End Header -->

    <!-- Content -->

        <div class="alamat p-3">
            <div class="text mb-2 fs-3">
                {{ $wisata->nama }}
            </div>
            <div class="lokasi d-flex gap-3 mb-2">
                <img src="img/iconlokasi.png" alt="" width="25" height="25">
                <p>{{ $wisata->alamatLengkap }}, {{ $wisata->provinsi }}</p>
            </div>
            <div class="jadwal d-flex gap-3 mb-2">
                <img src="img/iconjam.png" alt="" width="25" height="25">
                <p>{{ $wisata->jadwal }}</p>
            </div>
        </div>
        <h1 class="text-center mb-2">Informasi Wisata</h1>
        <div class="informasi mx-5 rounded-pill" style="background-color: #82969B;">
            {{ $wisata->informasi }}
        </div>
        <h1 class="text-center mb-2 mt-5">Detail Lokasi</h1>
        <div class="informasi mx-5 p-5 rounded-3" style="background-color: #82969B;">
            <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4596049380134!2d107.64536917454137!3d-6.9549860680909825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9cd0f2d3ccf%3A0x46036f6ce95b7a2e!2sMargacinta%20Park!5e0!3m2!1sen!2sid!4v1703495063323!5m2!1sen!2sid" width="1325" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="tanggal mt-5 mx-5 text-center">
            {{-- <form method="POST" action="{{ route('prosesPilihTiket') }}"> --}}
                <form method="POST" action="{{ route('prosesPilihTiket', ['id' => $wisata->id]) }}">
                @csrf

                <!-- Input hidden untuk menyimpan wisata_id -->
                <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                <div class="mb-3">
                    <label for="tanggal" class="form-label fs-1">Pilih Tanggal</label>
                    <input type="date" style="background-color: #82969B;" class="form-control" id="tanggal" name="tanggal"required>
                </div>
                <div class="pesen mx-5 rounded-3 mb-2 p-3" style="background-color: #82969B;">
                    <div class="text fs-4">
                        {{ $wisata->nama }} Ticket
                    </div>
                    <div class="line mb-3"></div>
                    <div class="detail d-flex justify-content-between">
                        <div class="harga fs-5">Rp {{ $wisata->harga }}</div>
                        <button class="btn border border-secondary rounded-pill" style="background-color: #072F39; color:white" type="submit">{{ __('Pilih Tiket') }}</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
        @endforeach
    <!-- End Content -->

    <!-- footer -->
    <footer class="text-center py-3 mt-5" style="background-color: #83979C;">
        <div class="container">
          <span style="color: white;">© 2023 Desti Guide company. All Rights Reserved.</span>
        </div>
    </footer>
    <!-- End Footer-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Add this at the bottom of your layout file, before the closing body tag -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</body>

</html>

