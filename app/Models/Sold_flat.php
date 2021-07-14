<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_flat extends Model
{
    use HasFactory;

    protected $fillable = [
        'flat_id',
        'client_id',
        'total_price'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function flat() {
        return $this->belongsTo(Flat::class);
    }
    
}
