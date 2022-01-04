<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaans = [
            [
                'nama' => 'pegawai'
            ],
            [
                'nama' => 'pns'
            ],
            [
                'nama' => 'pengusaha'
            ]
        ];
        foreach ($pekerjaans as $pekerjaan) {
            Pekerjaan::create([
                'nama' => $pekerjaan['nama']
            ]);
        }
    }
}
