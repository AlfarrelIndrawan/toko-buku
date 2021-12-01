@extends('utama.layout')
@section('title', 'Keranjang')
@section('konten')
<!-- keranjang -->
@if (empty($pembelian[0]))
<div class="card keranjang">
    <h1 class="text-center py-4">Keranjang kamu masih kosong nih! Yuk beli!</h1>
    <div class="text-center">
        <a href="/"><button class="btn rounded-pill px-4 py-3" style="background-color: #f0914d; color: white; width: 15%">BELI</button></a>
    </div>
</div>
@else
@php
$total = 0;
$i = 0;
@endphp
@foreach ($pembelian as $p)
@php
$total += $p->total_harga;
@endphp
<div class="card keranjang">
    <img class="card-img-top" src="{{ asset('img/produk1.png') }}" alt="produk.png" />
    <div class="card-body">
        <p class="card-text judul"><b>{{$p->nama}}</b></p>
        <p class="card-text penulis">{{$p->penulis}}</p>
        <p class="card-text kategori">{{$p->kategori}}</p>
        <p class="card-text penerbit">{{$p->penerbit}}</p>
        <p class="card-text penerbit">Jumlah: {{$p->jumlah}}</p>
        <p class="card-text harga">IDR {{number_format($p->total_harga, 0, ",", ".")}}</p>
        <a href="/keranjang/hapus/{{$id_pembelian[$i++]->id}}">
            <div class="hapus btn rounded-pill">Hapus</div>
        </a>
    </div>
</div>
@endforeach
@endif
<!-- end-keranjang -->

<!-- bottom navbar -->
@if (!empty($pembelian[0]))
<nav class="navbar fixed-bottom shadow lg-3 mb-5 bg-white rounded border container">
    <p class="total">Total Harga</p>
    <p class="harga">IDR {{number_format($total, 0, ",", ".")}}</p>
    <a href="/bayar">
        <div class="bayar btn rounded-pill">Bayar</div>
    </a>
</nav>
@endif
<!-- end-bottom navbar -->
@endsection