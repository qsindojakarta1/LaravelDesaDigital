<?php

use App\Http\Controllers\Api\DevController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Desa\AduanController;
use App\Http\Controllers\Desa\WargaController;
use App\Http\Controllers\Desa\AntrianController;
use App\Http\Controllers\Desa\CetakSuratController;
use App\Http\Controllers\Desa\DokumenController;
use App\Http\Controllers\Desa\GalleryController;
use App\Http\Controllers\Desa\PermohonanSuratController;
use App\Http\Controllers\Desa\InformasiController;
use App\Http\Controllers\Desa\KategoriInformasiController;
use App\Http\Controllers\Desa\LoketController;
use App\Http\Controllers\Desa\MarqueController;
use App\Http\Controllers\Desa\PenggunaController;
use App\Http\Controllers\Desa\PlaylistController;
use App\Http\Controllers\Desa\ProdukController;
use App\Http\Controllers\Desa\RateController;
use App\Http\Controllers\Desa\RatingController;
use App\Http\Controllers\Desa\SliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Warga\MasyarakatController;
use App\Models\Desa;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/execute', function () {
    shell_exec('composer install');
    shell_exec('cp .env.example .env');
    Artisan::call('key:generate');
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});

Auth::routes(['verify' => true]);

Route::get('apib/login', [App\Http\Controllers\Apib\AuthController::class, 'login'])->name('apib.login');
Route::get('apib/aduan', [App\Http\Controllers\Apib\AuthController::class, 'aduan'])->name('apib.aduan');
Route::get('apib/datas', [App\Http\Controllers\Apib\AuthController::class, 'datas'])->name('apib.datas');

Route::domain(getDesaFromUrl()->sub_domain . '.' . env('APP_DOMAIN_URL'))->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
        Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
        Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
        Route::get('/dokumen',[HomeController::class,'dokumen'])->name('dokumen');
        Route::get('/kategori/{id}', [HomeController::class, 'kategori'])->name('kategori');
        Route::get('/antrian', [HomeController::class, 'antrian'])->name('antrian');
        Route::post('/antrian', [HomeController::class, 'storeAntrian'])->name('antrian.store');
        Route::get('/aduan', [HomeController::class, 'aduan'])->name('aduan');
        Route::post('/aduan', [HomeController::class, 'storeAduan'])->name('aduan.store');
        Route::get('/penilaian', [HomeController::class, 'penilaian'])->name('penilaian');
        Route::get('/penilaian/{id}', [HomeController::class, 'storePenilaian'])->name('penilaian.store');
        Route::name('statistik.')->group(function () {
            Route::get('/pekerjaan', [HomeController::class, 'pekerjaan'])->name('pekerjaan');
            Route::get('/jenis_kelamin', [HomeController::class, 'jenis_kelamin'])->name('jenis_kelamin');
            Route::get('/kelompok_umur', [HomeController::class, 'kelompok_umur'])->name('kelompok_umur');
            Route::get('/agama', [HomeController::class, 'agama'])->name('agama');
        });
    });

    Route::middleware('auth')->middleware('accessadmin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/setting', [DashboardController::class, 'setting'])->name('setting');
        Route::post('/setting/{desa:id}', [DashboardController::class, 'updateSetting'])->name('setting.update');
        Route::prefix('utama')->name('utama.')->group(function () {
        });

        Route::prefix('kabupaten')->name('kabupaten.')->group(function () {
        });

        Route::prefix('desa')->name('desa.')->group(function () {
            Route::resource('kategori_informasi', KategoriInformasiController::class);
            Route::resource('aduan', AduanController::class);
            Route::resource('pengguna', PenggunaController::class);
            Route::resource('gallery', GalleryController::class);
            Route::resource('warga', WargaController::class);
            Route::resource('informasi', InformasiController::class);
            Route::resource('produk', ProdukController::class);
            Route::resource('gallery', GalleryController::class);
            Route::resource('warga', WargaController::class);
            Route::resource('loket', LoketController::class);
            Route::get('loket/{loket:id}', [LoketController::class, 'reset'])->name('loket.reset');
            Route::resource('antrian', AntrianController::class);
            Route::get('antrian/{antrian:id}/status', [AntrianController::class, 'status'])->name('antrian.status');
            Route::resource('permohonan', PermohonanSuratController::class);
            Route::resource('rates', RateController::class);
            Route::resource('rating', RatingController::class);
            Route::resource('playlist', PlaylistController::class);
            Route::resource('marque', MarqueController::class);
            Route::resource('cetak_surat', CetakSuratController::class);
            Route::resource('slider', SliderController::class);
            Route::resource('dokumen', DokumenController::class);
        });
        Route::prefix('warga')->middleware('verified')->name('warga.')->group(function () {
            Route::resource('masyarakat', MasyarakatController::class);
        });
    });

    Route::get('video/{playlist:id}', [PlaylistController::class, 'getVideo']);
    Route::get('kill', function () {
        Auth::logout();
    });
});
