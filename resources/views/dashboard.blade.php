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

    @if(session('error'))
    <div class="alert alert-danger" id="errorAlert">
        {{ session('error') }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Menghilangkan pesan error setelah 10 detik
            setTimeout(function(){
                $('#errorAlert').fadeOut();
            }, 5000);
        });
    </script>
@endif


    <div class="h-50 position-relative" style="background-image: url('img/Header2.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
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

        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <h1>Pesona Indonesia</h1>
            <p>Ayo kita jelajahi keindahan alam Indonesia</p>
        </div>
    </div>

    <!-- End Header -->

    <!-- Content -->
    <div class="bg mt-5">
        <nav class="navbar bg-body-tertiary row">
            <div class="container-fluid d-flex justify-content-center">
                <form class="d-flex input-group w-auto" role="search" action="{{ route('wisata.search') }}" method="GET">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">
                        <img src="img/searchicon.png" alt="Search" width="30" height="30">
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <div class="mt-5 text-center text-justify" style="font-size: 22">
        <p>Nikmati liburan anda dengan kami,
            <br> jangan khawatir kami selalu membantu anda.
            <br> Happy Holiday</p>
    </div>

    @foreach($destinations->shuffle()->take(1) as $destination)
    <div id="hero" class="mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="width: 70rem; padding-right:200px; background-color: #83979C">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6" >
                                <p class="card-text" style="font-size: 22">This is {{$destination->nama}}
                                <br>{{$destination->informasi}}</p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="" style="width: 1000px; padding-left:100px; padding-top: 40px; padding-bottom: 40px">
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    @endforeach


    <div class="container mt-5">
        <h1 class="text-center mb-5">Choose Your Destination</h1>

        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($destinations->shuffle()->take(3) as $destination)
                    <div class="col">
                        <div class="card border-0 h-100">
                            <img src="{{ asset('storage/' . $destination->image) }}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $destination->nama }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



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

