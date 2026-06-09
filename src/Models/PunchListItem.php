<?php

namespace Whilesmart\Issues\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PunchListItem
{
    protected array $fillable = [
        'issue_id',
        'title',
        'description',
        'due_date',
        'status',
        'assignee_id',
        'assignee_type',
        'creator_id',
        'creator_type',
        'meta'
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }
}