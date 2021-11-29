<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>DIGIBOOK</title>
</head>

<body>
    <div class="main">
        <!-- navbar -->
        <div class="navbar fixed-top">
            <div class="nav-item">
                <a class="item" href="index.html"><span>Home</span></a>
                <a class="item" href="keranjang.html"><span>Keranjang</span></a>
                <a class="item" href="profil.html"><span>Profil</span></a>
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

        <!-- kategori -->
        <div class="all btn button active-kategori rounded-pill">
            <span>All</span>
        </div>
        <div class="romance btn button rounded-pill">
            <span>Romance</span>
        </div>
        <div class="religion btn button rounded-pill">
            <span>Religion & Spirituality</span>
        </div>
        <div class="manga btn button rounded-pill">
            <span>Manga</span>
        </div>
        <div class="computer btn button rounded-pill">
            <span>Computers & Technology</span>
        </div>
        <div class="history btn button rounded-pill">
            <span>History</span>
        </div>
        <!-- end-kategori -->

        <!-- search -->
        <div class="search">
            <input class="input form-control mr-sm-2 rounded-pill" type="search" placeholder="Search..."
                aria-label="Search" />
        </div>
        <div class="submit">
            <button class="btn my-2 my-sm-0 rounded-pill" type="submit">
                <span>Search</span>
            </button>
        </div>
        <!-- end-search -->

        <!-- produk -->
        @foreach ($buku as $b)
        <div class="card produk">
            <img class="card-img-top" src="{{ asset('img/produk1.png') }}" alt="Card image cap" />
            <div class="card-body">
                <p class="card-text judul"><b>{{$b->nama}}</b></p>
                <p class="card-text penulis">{{$b->penulis}}</p>
                <p class="card-text kategori">{{$b->kategori}}</p>
                <p class="card-text harga">IDR {{$b->harga}}</p><br>
                <div class="tambah btn rounded-pill">
                    Tambah ke Keranjang
                </div>
            </div>
        </div>
        @endforeach
        <!-- end-produk -->

        <!-- js -->
        <script></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(".button").each(function() {
                $(this).click(function() {
                    $(this).addClass("active-kategori");
                    $(this).siblings().removeClass("active-kategori");
                });
            });
        });
        </script>
        <!-- end-js -->
    </div>
</body>

</html>