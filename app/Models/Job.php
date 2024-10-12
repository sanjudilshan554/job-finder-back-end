<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'category_id',
        'category_name',
        'type_id',
        'type_name',
        'description',
        'experience',
        'location',
        'salary',
        'working_hours',
        'company_name',
        'responsibilities',
        'image_id', 
    ];

}
