<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    protected $fillable = ['student_id', 'course_code', 'marks', 'grade'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public static function gradeFromMarks(float|int $marks): string
    {
        return match (true) {
            $marks >= 80 => 'A+',
            $marks >= 70 => 'A',
            $marks >= 60 => 'A-',
            $marks >= 50 => 'B',
            $marks >= 40 => 'C',
            default => 'F',
        };
    }

    protected static function booted(): void
    {
        static::saving(function (Result $result): void {
            $result->grade = self::gradeFromMarks($result->marks);
        });
    }
}
