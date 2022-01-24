<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ketua_rt()
    {
        return $this->belongsTo(Warga::class, 'ketua_rt_id');
    }
}
