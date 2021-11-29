<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class HomeController extends Controller
{
    public function index()
    {
        $buku = Buku::get();
        return view('index', compact('buku'));
    }
}