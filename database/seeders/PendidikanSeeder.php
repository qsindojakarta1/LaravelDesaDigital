<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendidikans = [
            [
                'nama' => 'sd'
            ],
            [
                'nama' => 'smp'
            ],
            [
                'nama' => 'smu'
            ],
            [
                'nama' => 'd1'
            ],
            [
                'nama' => 'd2'
            ],
            [
                'nama'=> 'd3'
            ],
            [
                'nama' => 'd4'
            ],
            [
                'nama' => 's1'
            ]
        ];
        foreach ($pendidikans as $pendidikan) {
            Pendidikan::create([
                'nama' => $pendidikan['nama']
            ]);
        }
    }
}
