<?php

use App\Console\Commands\FetchFeeds;
use Illuminate\Support\Facades\Schedule;

Schedule::command(FetchFeeds::class)->hourly();
