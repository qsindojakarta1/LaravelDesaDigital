<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSuratUsaha extends Model
{
    use HasFactory;
    public function permohonan_surat()
    {
        return $this->belongsTo(PermohonanSurat::class);
    }
}
