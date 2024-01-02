<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Candidate extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'hr_id',
        'name',
        'email',
        'phone',
        'dob',
        'current_company',
        'current_location',
        'notice_period',
        'pan_no',
        'skill',
        'qualification',
        'expected_ctc',
        'exprience',
        'current_ctc',
        'resume',
        'status',
    ];

    public $sortable = ['name', 'email', 'dob', 'notice_period', 'status'];

    public function hr_details()
    {
        return $this->belongsTo(\App\Models\HrDetail::class, 'hr_id');
    }
}
