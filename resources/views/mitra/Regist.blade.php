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
            <a class="navbar-brand" href="#">
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
            <h1>Pendaftaran Wisata</h1>
            <p class="text-center">Selamat datang di halaman Pendaftaran Wisata DESTIGUIDE. Untuk memulai proses pendaftaran Wisata Anda,
                <br>silakan untuk bisa melengkapi data-data di halaman ini dengan benar.</p>

                <div class="form p-5 mt-5 mb-4 rounded" style="width: 55%; background: #82969B">
                    <form action="{{ route('registWisata') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Wisata Yang Ingin Didaftarkan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis tanpa karakter simbol seperti #, @, %, dsb. Contoh: Margacinta Park" required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="noHp" class="form-label">No.Handphone Wisata</label>
                            <input type="text" class="form-control" id="noHp" name="noHp" placeholder="Tulis nomor telepon aktif dengan format 62xxx. Contoh: 628123456789" required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="alamatEmail" class="form-label">Alamat Email Wisata</label>
                            <input type="email" class="form-control" id="alamatEmail" name="alamatEmail" placeholder="Tulis alamat email aktif dengan huruf kecil. Contoh: soto.kudus@xxxx.com" required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="alamatLengkap" class="form-label">Alamat Lengkap Wisata</label>
                            <input type="text" class="form-control" id="alamatLengkap" name="alamatLengkap" placeholder="Tulis alamat lengkap dengan nomor; RT/RW; kelurahan; kecamatan; dan patokan." required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail Lokasi</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="Masukan Detail Alamat Dengan Sesuai berupa link" required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="kota" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota" placeholder="Tulis kota yang sesuai dengan alamat Wisata Anda." required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Tulis provinsi yang sesuai dengan alamat Wisata Anda." required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Tulis Kecamatan yang sesuai dengan alamat Wisata Anda." required>
                            <x-input-error :messages="$errors->get('alamatEmail')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Tiket</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga tiket" required>
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="jumlahTiket" name="jumlahTiket" placeholder="Tulis dengan jelas Informasi Umum terkait Wisata Anda." required>
                        </div>

                        <div class="mb-3">
                            <label for="jadwal" class="form-label">Pilih Jadwal</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Senin">
                                <label class="form-check-label" for="jadwal">Senin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Selasa">
                                <label class="form-check-label" for="jadwal">Selasa</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Rabu">
                                <label class="form-check-label" for="jadwal">Rabu</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Kamis">
                                <label class="form-check-label" for="jadwal">Kamis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Jumat">
                                <label class="form-check-label" for="jadwal">Jumat</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Sabtu">
                                <label class="form-check-label" for="jadwal">Sabtu</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="jadwal[]" value="Minggu">
                                <label class="form-check-label" for="jadwal">Minggu</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="informasi" class="form-label">Informasi umum</label>
                            <input type="text" class="form-control" id="informasi" name="informasi" placeholder="Tulis dengan jelas Informasi Umum terkait Wisata Anda." required>
                        </div>

                        <div class="mb-3">
                            <label for="syarat" class="form-label">Syarat & ketentuan</label>
                            <input type="text" class="form-control" id="syarat" name="syarat" placeholder="Tuliskan Syarat dan Ketentuan terkait Wisata Anda." required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Lampirkan Beberapa Foto </label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="text"></div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
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
