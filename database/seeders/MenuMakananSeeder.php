<?php

namespace Database\Seeders;
use App\Models\MenuMakanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuMakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\MenuMakanan::factory(10)->create();
    }
}
