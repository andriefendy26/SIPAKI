<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
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


    protected $casts = [
        'report_date'  => 'date:Y-m-d',
        'target'       => 'decimal:2',
        'realization'  => 'decimal:2',
        'achievement'  => 'decimal:2',
    ];

    // ─── Auto-assign authenticated user on create ────────────────────────────
    protected static function booted(): void
    {
        static::creating(function (Report $report) {
            if (auth()->check() && empty($report->user_id)) {
                $report->user_id = auth()->id();
            }
        });
    }

    // ─── Relationships ────────────────────────────────────────────────────────
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function classification(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function evidence(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Evidence::class);
    }
}