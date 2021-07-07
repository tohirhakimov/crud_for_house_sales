<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porche extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
        'house_id'
    ];

    public function house() {
        return $this->belongsTo(House::class);
    }

    
    public function floors() {
        return $this->hasMany(Floor::class);
    }
}
