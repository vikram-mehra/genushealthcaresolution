<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'course_topic_id', 'quizType', 'remark', 'question', 'ans_a', 'ans_b', 'ans_c', 'ans_d', 'correct_ans'];

    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }
    
    public function course_topic()
    {
        return $this->belongsTo(\App\Models\CourseTopic::class);
    }
}
