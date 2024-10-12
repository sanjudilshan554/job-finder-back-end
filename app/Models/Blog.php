<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'status',
        'title',
        'slug',
        'category_id',
        'category_name',
        'view_text',
        'text',
        'posted_by_id',
        'posted_by_name',
        'image_id',
        'meta_tags',
    ];
}
