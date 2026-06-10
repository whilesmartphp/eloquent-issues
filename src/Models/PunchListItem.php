<?php

namespace Whilesmart\Issues\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Whilesmart\Files\Traits\HasFiles;

class PunchListItem extends Model
{
    use HasFiles;
    use SoftDeletes;

    protected $fillable = [
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

    public function assignee(): MorphTo
    {
        return $this->morphTo();
    }

    public function creator(): MorphTo
    {
        return $this->morphTo();
    }
}
