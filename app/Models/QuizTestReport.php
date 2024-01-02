<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTestReport extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'question_id', 'given_ans', 'correct_ans', 'total_que', 'date'];
}
