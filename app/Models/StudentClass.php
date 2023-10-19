<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function grade($id)
    {
        $grade = Grade::findOrFail($id);
        return $grade->name;
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
