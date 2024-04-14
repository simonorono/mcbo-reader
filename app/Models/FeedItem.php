<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'pubDate' => 'timestamp',
    ];
}
