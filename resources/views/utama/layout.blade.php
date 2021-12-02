<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>

<body>
    <div class="main">
        <!-- navbar -->
        <div class="navbar fixed-top">
            <div class="nav-item">
                <a class="item" href="/"><span>Home</span></a>
                <a class="item" href="/keranjang"><span>Keranjang</span></a>
                <a class="item" href="/profil"><span>Profil</span></a>
            </div>
            @auth
            <a class="logout" href="/logout"><span>LOG OUT</span></a>
            @endauth
            @guest
            <a class="logout" href="/login"><span>LOG IN</span></a>
            @endguest
            <div class="logo"></div>
            <span class="brand">Toko Buku Online<br />DIGIBOOK</span>
            @auth
            <div class="user">
                <img src="{{ asset('img/user.png') }}" alt="user.png" />
                <span class="username">{{Auth::user()->email}}</span>
            </div>
            @endauth
        </div>
        <!-- end-navbar -->
        @yield('konten')
    </div>
</body>
</html>