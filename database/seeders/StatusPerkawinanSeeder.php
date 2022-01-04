<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_perkawinans = [
            [
                'nama' => 'menikah'
            ],
            [
                'nama' => 'belum menikah'
            ]
        ];
        foreach ($status_perkawinans as $status_perkawinan) {
            StatusPerkawinan::create([
                'nama' => $status_perkawinan['nama']
            ]);
        }
    }
}
