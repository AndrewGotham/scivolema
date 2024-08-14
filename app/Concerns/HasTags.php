<?php

namespace App\Concerns;

use App\Models\Tag;
use Illuminate\Support\Arr;

trait HasTags
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // $model->hasTag('trending'); // true
    public function hasTag($tag): bool
    {
        return $this->tags()->get()->contains(Tag::wrap($tag));
    }

    // $model->hasAnyTag('important', 'valuable', 'woderful'); // true
    public function hasAnyTag(...$tags): bool
    {
        foreach (Arr::flatten($tags) as $tag) {
            if ($this->hasTag($tag)) {
                return true;
            }
        }

        return false;
    }

    // $model->addTag('trending')->addTag('wonderful');
    public function addTag(...$tag): void
    {
        foreach (Arr::flatten($tag) as $tag) {
            $this->tags()->attach(Tag::wrap($tag));
        }
    }

    // $model->removeTag('trending');
    public function removeTag(...$tag): void
    {
        foreach (Arr::flatten($tag) as $tag) {
            $this->tags()->detach(Tag::wrap($tag));
        }
    }
}
