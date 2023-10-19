<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reading_record(): HasMany
    {
        return $this->hasMany(ReadingRecord::class);
    }

    public function grade(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class);
    }
}
