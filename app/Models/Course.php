<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    public function course_topic()
    {
        return $this->hasMany(\App\Models\CourseTopic::class);
    }
}
