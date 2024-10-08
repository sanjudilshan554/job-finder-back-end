<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'image_id',
        'description',
    ];
}
