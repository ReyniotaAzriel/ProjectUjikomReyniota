<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            [
                'id' => '1',
                'nama_jurusan' => 'PPLG RPL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'nama_jurusan' => 'AKKUL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'nama_jurusan' => 'PEMASARAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'nama_jurusan' => 'TJKT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'nama_jurusan' => 'MPLB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
