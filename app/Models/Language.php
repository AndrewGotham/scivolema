<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use HasFactory;
    use Searchable;

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

    protected $searchableFields = ['*'];

    protected $casts = [
        'default' => 'boolean',
        'fallback' => 'boolean',
        'available' => 'boolean',
        'active' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
