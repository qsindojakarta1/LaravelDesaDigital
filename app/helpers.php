<?php

use App\Models\Desa;

function getDesaFromUrl()
{
    try {
        $url = str_replace('.localhost', '', parse_url(request()->root())['host']);
        return Desa::where('sub_domain', $url)->first() ?? Desa::find(random_int(1,Desa::count()));
    } catch (Throwable $e) {
        dd($e->getMessage());
    }
}
