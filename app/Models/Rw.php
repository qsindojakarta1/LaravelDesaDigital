<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
    public function ketua_rw()
    {
        return $this->belongsTo(Warga::class,'ketua_rw_id');
    }
    public function rt()
    {
        return $this->hasMany(Rt::class);
    }
}
