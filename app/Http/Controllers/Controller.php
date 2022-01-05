<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Throwable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private static $desa;
    public function __construct()
    {
        try{
            $url = str_replace('.localhost:8000', '', str_replace('http://', '', request()->root()));
            self::$desa = Desa::where('sub_domain', $url)->firstOrFail();
        }catch(Throwable $e){
            dd($e->getMessage());
        }
    }
    public static function getDesa()
    {
        return self::$desa;
    }
}
 