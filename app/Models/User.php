<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
class User extends Authenticatable
{
    
    public function prospect() {
        return $this->belongsTo('App\Models\Prospect');
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))
            ->timezone('Asia/Jakarta')
            ->toDateTimeString()
        ;
    }
    protected $fillable = [
    ];
    protected $primaryKey = 'PN';
    public $incrementing = false; 
}
