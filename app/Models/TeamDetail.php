<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDetail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'designation', 'content', 'photo', 'status', 'description'];
}
