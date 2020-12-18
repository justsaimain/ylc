<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'unit_code', 'name', 'description'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
