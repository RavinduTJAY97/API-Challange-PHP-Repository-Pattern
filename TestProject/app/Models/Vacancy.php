<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable = ['id',
        'job_title',
        'seniority_level',
        'country',
        'city',
        'salary',
        'currency',
        'required_skills',
        'company_size',
        'company_domain',
    ];
}
