<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\Index;
use App\Http\Controllers\ShowFeedItem;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);

Route::resource('feeds', FeedController::class)->only('index', 'show');
Route::get('/feed-item/{item}', ShowFeedItem::class)->name('show-feed-item');
