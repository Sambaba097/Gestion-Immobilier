<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    use HasFactory;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    protected $fillable = [
        'nom',
        'category',
        'image',
        'description',
        'adresse',
        'status',
    ];
}
