<?php

use App\Console\Commands\CleanupFeedFetchRecords;
use App\Console\Commands\FetchFeeds;
use Illuminate\Support\Facades\Schedule;

Schedule::command(CleanupFeedFetchRecords::class)->dailyAt('10:00');
Schedule::command(FetchFeeds::class)->everyThirtyMinutes();
