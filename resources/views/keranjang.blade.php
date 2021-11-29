<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="main" style="padding-top: 200px;">
        <!-- navbar -->
        <div class="navbar fixed-top">
            <div class="nav-item">
                <a class="item" href="index.html"><span>Home</span></a>
                <a class="item" href="keranjang.html"><span>Keranjang</span></a>
                <a class="item" href="profil.html"><span>Profil</span></a>
            </div>
            <a class="logout" href="#"><span>LOG OUT</span></a>
            <div class="logo"></div>
            <span class="brand">Toko Buku Online<br />DIGIBOOK</span>
            <div class="user">
                <img src="{{ asset('img/user.png') }}" alt="user.png" />
                <span class="username">user@gmail.com</span>
            </div>
        </div>
        <!-- end-navbar -->

        <!-- keranjang -->
        <div class="card keranjang">
            <img class="card-img-top" src="{{ asset('img/produk1.png') }}" alt="produk.png" />
            <div class="card-body">
                <p class="card-text judul"><b>Catatan Tentang Hujan</b></p>
                <p class="card-text penulis">Anindya Frista</p>
                <p class="card-text kategori">Romance</p>
                <p class="card-text penerbit">Elex Media Komputindo</p>
                <p class="card-text harga">IDR 89,000</p>
                <div class="hapus btn rounded-pill">Hapus</div>
            </div>
        </div>
        <div class="card keranjang">
            <img class="card-img-top" src="{{ asset('img/produk1.png') }}" alt="produk.png" />
            <div class="card-body">
                <p class="card-text judul"><b>Catatan Tentang Hujan</b></p>
                <p class="card-text penulis">Anindya Frista</p>
                <p class="card-text kategori">Romance</p>
                <p class="card-text penerbit">Elex Media Komputindo</p>
                <p class="card-text harga">IDR 89,000</p>
                <div class="hapus btn rounded-pill">Hapus</div>
            </div>
        </div>
        <!-- end-keranjang -->

        <!-- bottom navbar -->
        <nav class="navbar fixed-bottom shadow lg-3 mb-5 bg-white rounded border">
            <p class="total">Total Harga</p>
            <p class="harga">IDR 267,000</p>
            <div class="bayar btn rounded-pill">Bayar</div>
        </nav>
        <!-- end-bottom navbar -->
    </div>
</body>

</html>