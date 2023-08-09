<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'prospect_id',
        'rekening_debitur',
        'cif_debitur',
        'pemilik_rekening',
        'tanggal_realisasi',
        'keterangan'
    ];

    protected $dates = ['tanggal_realisasi'];

    // public function getFromDateAttribute($value) {
    //     return \Carbon\Carbon::parse($value)->format('d-m-Y');
    // }
}
