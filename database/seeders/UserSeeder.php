<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => "test@gmail.com",
            'password' =>Hash::make("12345678"),
            'nama' => "testing",
            'alamat' => 'jalan pontianak 2 f150 bekasi selatan',
        ]);
    }
}
