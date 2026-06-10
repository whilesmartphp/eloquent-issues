<?php

namespace Whilesmart\Issues\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property int $issue_id
 * @property string $assignee_type
 * @property int $assignee_id
 */
class IssueAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id',
        'assignee_id',
        'assignee_type',
    ];

    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }

    public function assignee(): MorphTo
    {
        return $this->morphTo();
    }
}
