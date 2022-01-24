<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public function ketua_dusun()
    {
        return $this->belongsTo(Warga::class,'ketua_dusun_id');
    }
    public function rw()
    {
        return $this->hasMany(Rw::class);
    }
}
