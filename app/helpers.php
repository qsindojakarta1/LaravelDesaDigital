<?php

use App\Models\Desa;

function getDesaFromUrl()
{
    $url = str_replace('.localhost', '', parse_url(request()->root())['host']);
    return Desa::where('sub_domain', $url)->first() ??  Desa::find(random_int(1, Desa::count()));
}
