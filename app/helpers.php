<?php

use App\Models\Desa;

function getDesaFromUrl()
{
    try {
        $url = str_replace('.localhost', '', parse_url(request()->root())['host']);
        return Desa::where('sub_domain', $url)->firstOrFail();
    } catch (Throwable $e) {
        dd($e->getMessage());
    }
}
