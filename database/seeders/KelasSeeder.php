<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'id' => '1',
                'nama_kelas' => 'XII',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'nama_kelas' => 'XI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'nama_kelas' => 'X',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
