<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Romance',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Religion & Sprituality',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Manga',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Computers & Technology',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'History',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Travel',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Teen and Young Adult Fiction',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Sports and Outdoors',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Science and Nature',
            'harga' => 89000,
            'stok' => 10,
        ]);
        $user = Buku::create([
            'nama' => "Catatan Tentang Hujan",
            'penulis' => "Anindya Frista",
            'tahun_terbit' => "24 November 2021",
            'penerbit' => 'Elex Media Komputindo',
            'kategori' => 'Science Fiction and Fantasy',
            'harga' => 89000,
            'stok' => 10,
        ]);
    }
}
