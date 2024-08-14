<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function __toString()
    {
        return (string) $this->name;
    }

    public function questions()
    {
        return $this->morphedByMany(Question::class, 'taggable');
    }

    public function setNameAttribute($value)
    {
        if (! preg_match($regex = '/^[a-z0-9_]+$/', $value)) {
            throw new \InvalidArgumentException("invalid tag format: {$value} (it should match $regex)");
        }

        $this->attributes['name'] = $value;
    }
}
