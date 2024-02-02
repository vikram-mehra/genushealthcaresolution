<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDoc extends Model
{
    use HasFactory;

    protected $table = 'stu_doc';

    protected $fillable = ['student_id', 'doc_id'];

    public function course_pdf()
    {
        return $this->hasOne(\App\Models\CoursePdf::class, 'id', 'doc_id');
    }

    public function student()
    {
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }
}
