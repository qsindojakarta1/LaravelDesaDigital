<?php

namespace Database\Seeders;

use App\Models\GolonganDarah;
use Illuminate\Database\Seeder;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $golongandarahs = [
            [
                'nama' => 'a'
            ],
            [
                'nama' => 'b'
            ],
            [
                'nama' => 'ab'
            ],
            [
                'nama' => 'o'
            ]
        ];
        foreach($golongandarahs as $darah){
            GolonganDarah::create([
                'nama' => $darah['nama']
            ]);
        }
    }
}
