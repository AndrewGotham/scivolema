<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Vote extends Model
{
    use HasFactory;

//    protected $primaryKey = null;
//    protected $primaryKey = 'votable_id';
//    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'votable_id',
        'votable_type',
        'user_id',
        'upvote'
    ];

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
