<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agamas = [
            [
                'nama' => 'islam'
            ],
            [
                'nama' => 'katolik'
            ],
            [
                'nama' => 'kristen'
            ],
            [
                'nama' => 'hindu'
            ],
            [
                'nama' => 'buddha'
            ]
        ];
        foreach ($agamas as $agama) {
            Agama::create([
                'nama' => $agama['nama']
            ]);
        }
    }
}
