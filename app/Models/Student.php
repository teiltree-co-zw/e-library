<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }

    public function student_class($student_id)
    {
        $class = DB::table('student_classes')->where('student_id', $student_id)->first();

        if ($class)
        {
            $grade = Grade::findOrFail($class->class_id);
            $grade = $grade->name;

        }else{
            $grade = null;
        }

        return $grade;
    }
}
