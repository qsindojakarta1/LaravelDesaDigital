<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function wargas()
    {
        return $this->hasMany(Warga::class);
    }
}
