<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AssignInterview extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'hr_id',
        'candidate_id',
        'company_id',
        'date',
        'time',
        'status',
        'remark',
        'status_hr_id',
        'joining_date',
    ];

    public $sortable = ['hr_id', 'candidate_id', 'company_id', 'date', 'time'];

    public function candidate()
    {
        return $this->belongsTo(\App\Models\HR\Candidate::class);
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\HR\Company::class);
    }

    public function hr_details()
    {
        return $this->belongsTo(\App\Models\HrDetail::class, 'hr_id');
    }
}
