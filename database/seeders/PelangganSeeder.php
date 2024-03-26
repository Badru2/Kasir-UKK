<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'pelanggan',
        ]);
    }
}
