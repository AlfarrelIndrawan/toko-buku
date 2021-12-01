<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Pembayaran</title>
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
        @if (empty($pembelian[0]))
        <div class="card keranjang">
            <h1>Keranjang kamu masih kosong nih! Yuk beli!</h1>
            <a href="/"><button>BELI</button></a>
        </div>
        @else
        @php
            $total = 0;
            $nomor = 1;
        @endphp
        <div class="card keranjang" style="height:auto;">
            <h3 class="card-text text-center">Pembayaran</h3>
            <div class="card-body">
        @foreach ($pembelian as $p)
        @php
            $total += $p->total_harga;
        @endphp
                <div class="row pe-5 pb-3">
                    <div class="col">
                        <p class="card-text judul"><b>{{$nomor++}}. {{$p->nama}}</b></p>
                        <p class="card-text penerbit">Jumlah: {{$p->jumlah}}</p>
                    </div>
                    <div class="col">
                        <p class="card-text harga">IDR {{number_format($p->total_harga, 0, ",", ".")}}</p>
                    </div>
                </div>
                @endforeach
                <h4 class="card-text harga pe-5" style="color: black;">Total Pembelian IDR {{number_format($total, 0, ",", ".")}}</h4>
                <form action="{{route('proses_bayar')}}" method="post">
                    @csrf
                    <div class="row py-4">
                        <div class="col-5">
                        </div>
                        <div class="col">
                            <label for="bukti_pembayaran" class="mx-auto bayar btn rounded-pill py-2 px-5 text-center" style="border-color: rgba(240, 145, 77, 1);  color: rgba(240, 145, 77, 1);">Kirim Bukti</label>
                            <input type="file" class="d-none" name="bukti" id="bukti_pembayaran" required>
                        </div>
                        <div class="col-5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                        </div>
                        <div class="col">
                            <button id="selesai_bayar" type="submit" class="mx-auto bayar btn rounded-pill py-2 px-5 text-center" style="border-color: rgba(240, 145, 77, 1);  color: rgba(240, 145, 77, 1);" disabled>Pembayaran</button>
                        </div>
                        <div class="col-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!-- end-keranjang -->
    </div>
    <script>
        document.getElementById("bukti_pembayaran").onclick = function() {
            document.getElementById("selesai_bayar").disabled = false;
        };
    </script>
</body>

</html>