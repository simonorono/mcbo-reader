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
        Schema::create('feed_items', function (Blueprint $table) {
            $table->id();

            $table->string('guid');
            $table->string('title');
            $table->string('category')->nullable();
            $table->string('link');
            $table->timestamp('pubDate')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();

            $table->foreignIdFor(Feed::class)->constrained();

            $table->unique(['feed_id', 'guid']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_items');
    }
};
