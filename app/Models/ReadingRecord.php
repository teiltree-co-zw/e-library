<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReadingRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['read_start', 'read_end'];

    public function getReadingDurationAttribute()
    {
        if ($this->read_start && $this->read_end) {
            return $this->read_end->diffForHumans($this->read_start, ['parts' => 2]);
        }

        return null;
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
