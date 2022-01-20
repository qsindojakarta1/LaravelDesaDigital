<?php

namespace Database\Factories;

use App\Models\Agama;
use App\Models\Desa;
use App\Models\GolonganDarah;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\Suku;
use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WargaFactory extends Factory
{
    protected $model = Warga::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => random_int(1, Desa::count()),
            'kk' => rand(),
            'nik' => rand(),
            'nama_warga' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'warga_negara' => $this->faker->country(),
            'agama_id' => random_int(1,Agama::count()),
            'pekerjaan_id' => random_int(1,Pekerjaan::count()),
            'pendidikan_id' => random_int(1,Pendidikan::count()),
            'status_perkawinan_id' => random_int(1,StatusPerkawinan::count()),
            'suku_id' => random_int(1,Suku::count()),
            'golongan_darah_id' => random_int(1,GolonganDarah::count()),
            'golongan_darah_id' => random_int(1,GolonganDarah::count()),
            'golongan_darah_id' => random_int(1,GolonganDarah::count()),
            'golongan_darah_id' => random_int(1,GolonganDarah::count()),
        ];
    }
}
