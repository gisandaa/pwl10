<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah as MataKuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa_matakuliah')->insert([
            [
                'mahasiswa_id' => Mahasiswa::min('nim'),
                'matakuliah_id' => MataKuliah::min('id'),
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => Mahasiswa::min('nim'),
                'matakuliah_id' => MataKuliah::min('id') + 1,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => Mahasiswa::min('nim'),
                'matakuliah_id' => MataKuliah::min('id') + 2,
                'nilai' => 'A'
            ],
            [
                'mahasiswa_id' => Mahasiswa::min('nim'),
                'matakuliah_id' => MataKuliah::min('id') + 3,
                'nilai' => 'A'
            ]
        ]);

        for ($i = 0; $i < 10; $i++) {
            $nim = Mahasiswa::inRandomOrder()->first()->Nim;
            $nilai = ['A', 'B', 'B+', 'C', 'C+'];

            DB::table('mahasiswa_matakuliah')->insert([
                [
                    'mahasiswa_id' => $nim,
                    'matakuliah_id' => MataKuliah::min('id'),
                    'nilai' => $nilai[array_rand($nilai)]
                ],
                [
                    'mahasiswa_id' => $nim,
                    'matakuliah_id' => MataKuliah::min('id') + 1,
                    'nilai' => $nilai[array_rand($nilai)]
                ],
                [
                    'mahasiswa_id' => $nim,
                    'matakuliah_id' => MataKuliah::min('id') + 2,
                    'nilai' => $nilai[array_rand($nilai)]
                ],
                [
                    'mahasiswa_id' => $nim,
                    'matakuliah_id' => MataKuliah::min('id') + 3,
                    'nilai' => $nilai[array_rand($nilai)]
                ]
            ]);
        }
    }
}
