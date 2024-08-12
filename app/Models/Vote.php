<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Vote extends Model
{
    use HasFactory;
    use Searchable;

    protected $searchableFields = ['*'];

//    protected $primaryKey = null;
//    protected $primaryKey = 'votable_id';
//    public $incrementing = false;
//    public $timestamps = false;

    protected $fillable = [
        'votable_id',
        'votable_type',
        'user_id',
        'upvote'
    ];

    protected $casts = [
        'upvote' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
