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
            'total_harga' => $harga,
            'status' => "Keranjang",
        ]);
        $stok = $request->stok - $request->quant[2];
        Buku::where('id', $request->id_buku)->update(['stok' => $stok]);
        return redirect('/');
    }

    public function keranjang(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $pembelian = Pembelian::leftJoin('bukus', 'pembelians.buku_id', '=', 'bukus.id')->where('user_id', $id)->where('status', 'keranjang')->get();
            return view('keranjang', compact('pembelian'));
        } else {
            return redirect('/login');
        }
    }
}