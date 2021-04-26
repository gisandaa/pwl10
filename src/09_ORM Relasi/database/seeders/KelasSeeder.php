<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            ['nama kelas' => 'TI 2A',],
            ['nama kelas' => 'TI 2B',],
            ['nama kelas' => 'TI 2C',],
            ['nama kelas' => 'TI 2D',],
            ['nama kelas' => 'TI 2E',],
            ['nama kelas' => 'TI 2F',],
            ['nama kelas' => 'TI 2G',],
            ['nama kelas' => 'TI 2H',],
            ['nama kelas' => 'TI 2I',],
        ];
        DB::table('kelas')->insert($kelas);
    }
}
