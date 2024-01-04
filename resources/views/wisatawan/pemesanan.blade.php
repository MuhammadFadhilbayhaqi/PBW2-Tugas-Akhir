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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Register</title>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-light" style="background-color: #072F39;">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="img/Logo.png" alt="" width="50" height="50">
            </a>
            <div class="d-flex">
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


    <!-- End Header -->

    <!-- Content -->
    <div class="bg">
        <div class="judul d-flex flex-column justify-content-center align-items-center mt-5">
            <h1>Pemesanan Anda</h1>
            <p class="text-center">Data Pemesanan</p>

                <div class="form p-5 mt-5 mb-4 rounded" style="width: 60%; background: #82969B">
                   <!-- Form Pemesanan -->
<div class="bg">
    <div class="judul d-flex flex-column justify-content-center align-items-center mt-5">
        <h1>Pemesanan Anda</h1>
        <p class="text-center">Data Pemesanan</p>

        <div class="form p-5 mt-5 mb-4 rounded" style="width: 60%; background: #82969B">
            <form method="POST" action="{{ route('pemesanan.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="nomor_handphone" class="form-label">Nomor Handphone</label>
                    <input type="email" class="form-control" id="nomor_handphone" name="nomor_handphone" required>
                    <x-input-error :messages="$errors->get('nomor_handphone')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="ktp" class="form-label">Kartu Tanda Penduduk</label>
                    <input type="text" class="form-control" id="ktp" name="ktp" required>
                    <x-input-error :messages="$errors->get('ktp')" class="mt-2" />
                </div>
        </div>
    </div>
</div>

<!-- Form Pembayaran -->
<div class="bg">
    <div class="judul d-flex flex-column justify-content-center align-items-center mt-5">
        <p class="text-center fs-4">Pembayaran</p>
        <div class="form p-3 mb-4 rounded" style="width: 60%; background: #82969B">
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option selected>Choose...</option>
                        <option value="Bca - 7751330611">Bca - 7751330611</option>
                        <option value="Mandiri - 141-00-1234567-8">Mandiri - 141-00-1234567-8</option>
                    </select>
                </div>
                <div class="Rincian">
                    <p class="fs-3">Rincian Harga</p>
                    <div class="detail d-flex justify-content-between">
                        <div>
                            <p>Margacinta Waterpark Weekday Ticket Other x 1
                                <br>Biaya Layanan
                            </p>
                        </div>
                        <div>
                            <p> Rp 50.000
                                <br> Rp 50.000
                            </p>
                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="total">
                    <p class="fs-3">Harga Total</p>
                    <div class="totalharga d-flex justify-content-between">
                        <div>
                            <p>Total Harga</p>
                        </div>
                        <div>
                            <p> Rp 50.000</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="text"></div>
                    <button type="submit" class="btn rounded-pill" style="background-color: #072F39; color:#FFFFFF">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    <!-- End Content -->

    <!-- footer -->
    <footer class="text-center" style="background-color: #FFFFFF">
        <!-- Grid container -->
        {{-- <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="#!"
              role="button"
              ><i class="bi bi-instagram"></i
            ></a>

            <!-- Github -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #333333;"
              href="#!"
              role="button"
              ><i class="bi bi-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div> --}}
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: #2482C1">
            © 2023 Desti Guide company. All Rights Reserved.
        </div>
        <!-- Copyright -->
      </footer>
    {{-- <footer class="text-center py-3" style="background-color: #2FB69F;">
        <div class="container">
          <span style="color: white;">copyright@2023</span>
        </div>
    </footer> --}}
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
