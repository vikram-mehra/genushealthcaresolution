<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    use HasFactory;

    protected $table = 'course_video';

    protected $fillable = ['course_id', 'topic_id', 'video_link', 'video_vemio', 'upload_video', 'status'];
}
