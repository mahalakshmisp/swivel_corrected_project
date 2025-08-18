<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    protected static function booted()
    {
        static::saving(function ($course) {
            if (empty($course->slug) && !empty($course->name)) {
                $base = Str::slug($course->name);
                $slug = $base ?: 'course-' . ($course->id ?? 'new');
                $i = 1;
                while (static::where('slug', $slug)->when(isset($course->id), fn ($q) => $q->where('id', '!=', $course->id))->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $course->slug = $slug;
            }
        });
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}