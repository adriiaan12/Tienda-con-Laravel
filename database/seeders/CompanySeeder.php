<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Company')->insert([
            ['name' => 'TechNova Solutions'],
            ['name' => 'BlueOcean Corp'],
            ['name' => 'GreenLeaf Industries'],
            ['name' => 'Solaris Technologies'],
            ['name' => 'QuantumSoft Ltd'],
        ]);
    }
}
