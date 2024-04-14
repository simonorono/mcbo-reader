<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedItem extends Model
{
    protected $fillable = [
        'category',
        'content',
        'description',
        'guid',
        'link',
        'pubDate',
        'title',
    ];

    protected $casts = [
        'pubDate' => 'datetime',
    ];

    public function feed(): BelongsTo
    {
        return $this->belongsTo(Feed::class);
    }
}
