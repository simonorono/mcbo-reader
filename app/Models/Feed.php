<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feed extends Model
{
    protected $fillable = [
        'name',
        'url',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(FeedItem::class);
    }
}
