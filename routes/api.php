<?php

use App\Http\Controllers\Api\AduanController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\DevController;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\Api\JenisSuratController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\Api\SuratController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Desa;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('produk/desa/{id}',[DevController::class,'produk']);

Route::post('/reset-password-token', [AuthController::class, 'forgot']);
Route::post('password/reset', [AuthController::class,'reset']);

//API route for register new user
Route::post('/register', [AuthController::class, 'register']);
//API route for login user
Route::post('/login', [AuthController::class, 'login']);
//Protecting Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/jenissurat', [JenisSuratController::class, 'getjenissurat']);
    Route::get('/informasi', [InformasiController::class, 'getinformasi']);
    Route::resource('/produk',ProdukController::class)->except(['create','edit']);
    Route::resource('/aduan', AduanController::class)->except(['create', 'edit']);
    Route::resource('/surat', SuratController::class)->except(['create', 'edit', 'destroy', 'update', 'store', 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/select2/cetaksurat',[DevController::class,'getcetaksurat']);
Route::get('/select2/cetaksurat/{id}',[DevController::class,'showcetaksurat']);
Route::get('/select2/findfamily/{id}',[DevController::class,'getfindfamily']);

Route::post('agama',[DevController::class, 'agama']);
Route::post('suku',[DevController::class, 'suku']);
Route::post('golongandarah',[DevController::class,'golongandarah']);
Route::post('statusperkawinan',[DevController::class,'statusperkawinan']);
Route::post('pendidikan',[DevController::class,'pendidikan']);
Route::post('pekerjaan',[DevController::class,'pekerjaan']);
Route::post('umur',[DevController::class,'umur']);
Route::post('dusun',[DevController::class,'dusun']);
Route::post('jenis_kelamin',[DevController::class,'jeniskelamin']);

Route::get('/dusun/{id}',function($id){
    $rw = Rw::where('dusun_id',$id)->get();
    return response()->json($rw);
});
Route::get('/rw/{id}',function($id){
    $rt = Rt::where('rw_id',$id)->get();
    return response()->json($rt);
});
Route::get('/desa/{id}',function($id){
    $desa = Desa::find($id);
    $responses = [
        'desa' => $desa,
        'kecamatan' => $desa->kecamatan,
        'kabupaten' => $desa->kecamatan->kabupaten,
        'provinsi' => $desa->kecamatan->kabupaten->provinsi
    ];
    return response()->json($responses);
});