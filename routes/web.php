<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);

Route::resource('feeds', FeedController::class);
