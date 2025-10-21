<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuKopi;

class MenuKopiSeeder extends Seeder
{
    public function run(): void
    {
        MenuKopi::create([
            'nama' => 'Espresso',
            'harga' => 18000,
            'kategori' => 'Kopi Hitam',
            'tersedia' => true,
        ]);

        MenuKopi::create([
            'nama' => 'Cappuccino',
            'harga' => 22000,
            'kategori' => 'Kopi Susu',
            'tersedia' => true,
        ]);

        MenuKopi::create([
            'nama' => 'Latte',
            'harga' => 25000,
            'kategori' => 'Kopi Susu',
            'tersedia' => false,
        ]);
    }
}
