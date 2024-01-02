<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_id', 'order_id', 'transaction_id', 'name', 'phone', 'date', 'payment_mode','amount','payment_status', 'status'];

    public function course()
    {
        return $this->hasOne(\App\Models\Course::class, 'id', 'course_id');
    }

    public function student()
    {
        return $this->hasOne(\App\Models\Student::class, 'id', 'student_id');
    }
}
