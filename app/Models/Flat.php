<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'area',
        'price',
        'status',
        'floor_id'
    ];
    

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function floor() {
        return $this->belongsTo(Floor::class);
    }
    
}