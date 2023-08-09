<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogChanges extends Model
{
    use HasFactory;

    protected $fillable = [
        'aksi',
        'nama',
        'PN',
        'tabel_target',
        'id_target'
    ];
}
