<?php

namespace App\Console\Commands;

use App\Models\FeedFetchRecord;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CleanupFeedFetchRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup-feed-fetch-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes fetch records older than a month';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            FeedFetchRecord::where('created_at', '<', now()->subMonth())
                ->chunkById(100, function (Collection $records) {
                    FeedFetchRecord::whereIn('id', $records->pluck('id'))->delete();
                });
        });
    }
}
