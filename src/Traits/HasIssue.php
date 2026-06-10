<?php

namespace Whilesmart\Issues\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Whilesmart\Issues\Models\Issue;

// @phpstan-ignore-next-line
trait HasIssue
{
    public function issues(): MorphMany
    {
        return $this->morphMany(Issue::class, 'issuable');
    }
}
