@extends('utama.layout')
@section('title', 'Home')
@section('konten')
<div class="profil bg-light border p-5">
    <h4 class="text-center">Profil</h4>
    <div class="ps-5">
        <div class="py-1 pb-3">
            <img src="{{ asset('img/profil.png') }}" alt="profil.png" />
        </div>
        <div class="py-1">
            <p class="a"><b>Nama</b></p>
            <p class="b" style="display: inline-block">{{Auth::user()->nama}}</p>
        </div>
        <div class="py-1">
            <p class="a"><b>Email</b></p>
            <p class="b" style="display: inline-block">{{Auth::user()->email}}</p>
        </div>
        <div class="py-1">
            <p class="a"><b>Alamat</b></p>
            <p class="b" style="display: inline-block">{{Auth::user()->alamat}}</p>
        </div>
    </div>
    <h4 class="text-center">Riwayat Pembelian</h4>
    <div class="ps-5 py-4">
        @if (empty($pembelian[0]))
        <a href="/" class="text-black">
            <h5 class="text-center py-3">Kamu belum beli apapun! Ayok belanja!</h5>
        </a>
        @else
        @php
        $total = 0;
        $nomor = 1;
        @endphp
        @foreach ($pembelian as $p)
        @php
        $total += $p->total_harga;
        @endphp
        <div class="row pe-5 pb-3">
            <div class="col">
                <p class="card-text judul"><b>{{$nomor++}}. {{$p->nama}}</b></p>
                <p class="card-text penerbit">{{$p->kategori}}</p>
                <p class="card-text penerbit">Jumlah: {{$p->jumlah}}</p>
                <p class="card-text penerbit">Dibeli tanggal: {{$p->updated_at}}</p>
            </div>
            <div class="col">
                <p class="card-text harga">IDR {{number_format($p->total_harga, 0, ",", ".")}}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div>
@endsection