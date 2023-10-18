<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teacher_class($teacher_id)
    {
        $class = DB::table('teachers_grades')->where('teacher_id', $teacher_id)->first();

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
