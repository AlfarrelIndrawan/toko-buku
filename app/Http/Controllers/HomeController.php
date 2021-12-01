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
        return view('utama.index', compact('buku'));
    }

    public function keranjang(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $id_pembelian = Pembelian::select('id')->where('user_id', $id)->where('status', 'keranjang')->get();
            $pembelian = Pembelian::leftJoin('bukus', 'pembelians.buku_id', '=', 'bukus.id')->where('user_id', $id)->where('status', 'keranjang')->get();
            return view('utama.keranjang', compact('pembelian', 'id_pembelian'));
        } else {
            return redirect('/login');
        }
    }

    public function masuk_keranjang(Request $request)
    {
        $id_user = Auth::user()->id;
        if(empty(Pembelian::where('user_id', $id_user)->where('buku_id', $request->id_buku)->where('status', 'keranjang')->get()[0])) {
            $harga = $request->harga * $request->quant[2];
            Pembelian::create([
                'user_id' => $id_user,
                'buku_id' => $request->id_buku,
                'jumlah' => $request->quant[2],
                'total_harga' => $harga,
                'status' => "Keranjang",
            ]);
        } else {
            $jumlah = Pembelian::select('jumlah')->where('user_id', $id_user)->where('buku_id', $request->id_buku)->where('status', 'keranjang')->get();
            $stok = Buku::select('stok')->where('id', $request->id_buku)->get()[0]->stok;
            $jumlah_akhir = (int) $jumlah[0]->jumlah + (int) $request->quant[2];
            if($jumlah_akhir > $stok) {
                $jumlah_akhir = $stok;
            }
            $harga = $request->harga * $jumlah_akhir;
            Pembelian::where('user_id', $id_user)->where('buku_id', $request->id_buku)->where('status', 'keranjang')->update(['jumlah' => $jumlah_akhir, 'total_harga' => $harga]);
        }
        return redirect('/');
    }
    
    public function hapus_keranjang($id)
    {
        Pembelian::where('id', $id)->delete();
        return redirect('/keranjang');
    }

    public function bayar(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $id_pembelian = Pembelian::select('id')->where('user_id', $id)->where('status', 'keranjang')->get();
            $pembelian = Pembelian::leftJoin('bukus', 'pembelians.buku_id', '=', 'bukus.id')->where('user_id', $id)->where('status', 'keranjang')->get();
            return view('utama.bayar', compact('pembelian', 'id_pembelian'));
        } else {
            return redirect('/login');
        }
    }

    public function proses_bayar(Request $request)
    {
        $id = Auth::user()->id;
        $kode_buku = Pembelian::select('buku_id','jumlah')->where('user_id', $id)->where('status', 'keranjang')->get();
        foreach($kode_buku as $k) {
            $stok = Buku::select('stok')->where('id', $k->buku_id)->get()[0]->stok;
            $stok_baru = $stok - $k->jumlah;
            Buku::where('id', $k->buku_id)->update(['stok' => $stok_baru]);
        }
        Pembelian::select('id')->where('user_id', $id)->where('status', 'keranjang')->update(['bukti'=> $request->bukti, 'status' => 'Dibayar']);
        return redirect('/');
    }

    public function profil(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $pembelian = Pembelian::leftJoin('bukus', 'pembelians.buku_id', '=', 'bukus.id')->where('user_id', $id)->where('status', 'dibayar')->get();
            return view('utama.profil', compact('pembelian'));
        } else {
            return redirect('/login');
        }
    }
}