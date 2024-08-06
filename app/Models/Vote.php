<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vote extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'votable_id',
        'votable_type',
        'user_id',
    ];

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
