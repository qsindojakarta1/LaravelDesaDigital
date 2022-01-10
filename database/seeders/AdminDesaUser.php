<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminDesaUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desas = Desa::get();
        foreach ($desas as $desa) {
            User::create([
                'name' => $desa->nama_desa . '_' . $desa->sub_domain,
                'email' => $desa->sub_domain . '_' . $desa->nama_desa . '@' . env('APP_DOMAIN_URL') . '.com',
                'password' => Hash::make('password'),
                'desa_id' => $desa->id
            ])->assignRole('Desa');
        }
    }
}
