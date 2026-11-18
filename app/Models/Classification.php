<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'id_bagian',
    ];
    
    // public function bagian(){
    //     return $this->belongsTo(Bagian::class, 'id_bagian');
    // }

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function bagian()
    {
        return $this->belongsToMany(Bagian::class, 'classification_bagian', 'id_classification', 'bagian_id');
    }
}