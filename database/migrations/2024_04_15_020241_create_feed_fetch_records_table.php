<?php

use App\Models\Feed;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feed_fetch_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Feed::class)->constrained();
            $table->longText('rss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rss_fetch_records');
    }
};
