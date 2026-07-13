<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bagian extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->hasMany(User::class, 'id_bagian');
    }

    public function classifications(){
        return $this->hasMany(Classification::class, 'id_bagian');
    }
}
