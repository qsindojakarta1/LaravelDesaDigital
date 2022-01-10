<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained('desas');
            $table->foreignId('user_id')->nullable();
            $table->string('kk')->nullable();
            $table->integer('nik')->unique();
            $table->string('nama_warga');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat')->nullable();
            $table->string('warga_negara')->nullable();
            $table->string('status')->nullable()->default('ada');
            $table->foreignId('agama_id')->constrained('agamas');
            $table->foreignId('pendidikan_id')->constrained('pendidikans');
            $table->foreignId('pekerjaan_id')->constrained('pekerjaans');
            $table->foreignId('status_perkawinan_id')->constrained('status_perkawinans');
            $table->foreignId('suku_id')->constrained('sukus');
            $table->foreignId('golongan_darah_id')->constrained('golongan_darahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wargas');
    }
}
