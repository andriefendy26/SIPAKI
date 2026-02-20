<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classification_id',
        'unit_id',
        'report_date',
        'description',
        'target',
        'realization',
        'achievement',
    ];

    public function classification(){
        return $this->belongsTo(Classification::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function evidence(){
        return $this->hasMany(Evidence::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function booted()
    // {
    //     static::creating(function ($report) {
    //         if (auth()->check()) {
    //             $report->user_id = auth()->id();
    //         }
    //     });
    // }
}
