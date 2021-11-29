<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        return view('index', compact('buku'));
    }

    public function masuk_keranjang(Request $request)
    {
        $harga = $request->harga * $request->quant[2];
        Pembelian::create([
            'user_id' => Auth::user()->id,
            'buku_id' => $request->id_buku,
            'jumlah' => $request->quant[2],
            'harga' => $harga,
            'status' => "Keranjang",
        ]);
        $stok = $request->stok - $request->quant[2];
        Buku::where('id', $request->id_buku)->update(['stok' => $stok]);
        return redirect('/');
    }
}