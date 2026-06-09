<?php

namespace Whilesmart\Issues\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $issuable_type
 * @property int $issuable_id
 * @property string $type
 * @property string $description
 * @property string $severity
 * @property string $status
 * @property string $assignee_type
 * @property int $assignee_id
 * @property string $creator_type
 * @property int $creator_id
 * @property array $meta
 * @property Carbon $resolved_at
 * @property Carbon $closed_at
 */
class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'issuable_type',
        'issuable_id',
        'type',
        'description',
        'severity',
        'status',
        'assignee_id',
        'assignee_type',
        'creator_id',
        'creator_type',
        'meta',
        'resolved_at',
        'closed_at'
    ];

    protected $casts = [
        'resolved_at' => 'boolean',
        'meta' => 'array',
        'closed_at' => 'datetime',
    ];


    public function punchListItems(): HasMany
    {
        return $this->hasMany(PunchListItem::class, 'issue_id');
    }

    public function issuable(): MorphTo
    {
        return $this->morphTo();
    }

    public function creator(): MorphTo
    {
        return $this->morphTo();
    }

    public function assignee(): MorphTo
    {
        return $this->morphTo();
    }
}
