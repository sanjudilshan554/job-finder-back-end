<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCompany extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'web_address',
        'email',
        'location',
        'address',
        'description',
        'image_id',
    ];
}
