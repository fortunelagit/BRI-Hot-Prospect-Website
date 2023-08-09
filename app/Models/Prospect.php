<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Prospect extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'PN',
        'nama_CPP',
        'jenis_usaha',
        'sektor_industri',
        'alamat_usaha',
        'sumber_pipeline',
        'fasilitas',
        'segmen_kredit',
        'jenis_kredit',
        'potensial_kredit',
        'omzet_bulanan',
        'laba_bulanan',
        'mutasi_rekening_bri',
        'mutasi_rekening_bank_lainnya',
        'saldo_simpanan_bri',
        'saldo_simpanan_bank_lainnya',
        'segmen',
        'unit',
        'kode_unit',
        'branch',
        'status_prospek',
        'estimasi_realisasi',
        'status_approval',
        'PN_approval'
    ];
    

    protected $dates = ['estimasi_realisasi'];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone('Asia/Jakarta')
            ->toDateTimeString()
        ;
    }
    // public function getFromDateAttribute($value) {
    //     return \Carbon\Carbon::parse($value)->format('m-d-Y');
    // }
}
