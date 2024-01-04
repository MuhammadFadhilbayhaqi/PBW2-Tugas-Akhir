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

    {{-- <!-- Content -->
    <div class="bg" style="max-height: 100vh">
        <div class="atas p-5">
            <h1 class="mb-4 mt-4">Daftar Wisata</h1>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                  <div class="card h-100">
                    <img src="img/image 4.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary rounded-pill" style="background-color: #072F39">Kelola Wisata</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/image 4.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary rounded-pill" style="background-color: #072F39">Kelola Wisata</a>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <img src="img/image 4.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary rounded-pill" style="background-color: #072F39">Kelola Wisata</a>
                    </div>
                  </div>
                </div>
              </div>

    </div>

    <div class="d-flex justify-content-center align-items-center mb-4">
        <a href="{{ route('viewWisata') }}" class="btn btn-primary rounded-pill" style="background-color: #072F39">Daftar Wisata</a>
    </div>


    <!-- End Content --> --}}

    <!-- Content -->
<div class="bg" style="max-height: 100vh">
    <div class="atas p-5">
        <h1 class="mb-4 mt-4">Daftar Wisata</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($wisatas as $wisata)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $wisata->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('kelolaWisata') }}" class="btn btn-primary rounded-pill" style="background-color: #072F39">Kelola Wisata</a>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center mb-4">
        <a href="{{ route('viewWisata') }}" class="btn btn-primary rounded-pill" style="background-color: #072F39">Daftar Wisata</a>
    </div>
</div>
<!-- End Content -->


    <!-- footer -->
    <footer class="text-center" style="background-color: #FFFFFF">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: #2482C1">
            © 2023 Desti Guide company. All Rights Reserved.
        </div>
        <!-- Copyright -->
      </footer>


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
