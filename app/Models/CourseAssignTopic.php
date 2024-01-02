<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssignTopic extends Model
{
    use HasFactory;
    protected $fillable = ['course_id','course_topic_id'];
}
