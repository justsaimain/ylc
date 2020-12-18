<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['unit_id', 'lesson_code', 'name', 'description', 'video'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function exercise()
    {
        return $this->hasMany(Exercise::class);
    }
}
