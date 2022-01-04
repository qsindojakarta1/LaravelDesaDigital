<?php

namespace Database\Seeders;

use App\Models\Suku;
use Illuminate\Database\Seeder;

class SukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sukus = [
            [
                'nama' => 'sunda'
            ],
            [
                'nama' => 'betawi'
            ],
            [
                'nama' => 'batak'
            ],
            [
                'nama' => 'jawa'
            ]
        ];
        foreach ($sukus as $suku) {
            Suku::create([
                'nama' => $suku['nama']
            ]);
        }
    }
}
