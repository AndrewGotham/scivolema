<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'default',
        'fallback',
        'code',
        'regional',
        'script',
        'dir',
        'flag',
        'name',
        'english',
        'slug',
        'available',
        'active',
    ];
}
