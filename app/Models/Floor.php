<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'porche_id',
        'name',
        'number'
    ];

    public function porche() {
        return $this->belongsTo(Porche::class);
    }

    public function flats() {
        return $this->hasMany(Flat::class);
    }
}
