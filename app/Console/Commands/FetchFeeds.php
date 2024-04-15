<?php

namespace App\Console\Commands;

use App\Models\Feed;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use SimpleXMLElement;

class FetchFeeds extends Command
{
    const EASY_PROPERTIES = [
        'category',
        'description',
        'guid',
        'link',
        'pubDate',
        'title',
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-feeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch articles in each feed';

    protected function getContent(SimpleXMLElement $item): ?string
    {
        // try simple content
        $content = (string) $item->content;

        if (strlen($content) > 0) {
            return $content;
        }

        // try encoded content
        $contentElement = $item->children('content', true);
        $encodedContent = (string) $contentElement->encoded;

        if (strlen($encodedContent) > 0) {
            return $encodedContent;
        }

        // stop trying
        return null;
    }

    protected function getEasyProperties(SimpleXMLElement $item): array
    {
        $props = [];

        foreach (self::EASY_PROPERTIES as $prop) {
            $props[$prop] = (string) $item->{$prop};
        }

        return $props;
    }

    protected function storeItem(Feed $feed, SimpleXMLElement $item)
    {
        $props = $this->getEasyProperties($item);
        $props['pubDate'] = Carbon::parse($props['pubDate']);
        $props['content'] = $this->getContent($item);

        $feed->items()->updateOrCreate(
            [
                'feed_id' => $feed->id,
                'guid' => $props['guid'],
            ],
            $props,
        );
    }

    protected function fetchFeed(Feed $feed): void
    {
        $content = file_get_contents($feed->url);

        $feed->fetchRecords()->create(['rss' => $content]);

        $xml = simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA);

        foreach ($xml->channel->item as $item) {
            $this->storeItem($feed, $item);
        }
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Feed::chunk(10, function (Collection $feeds) {
            foreach ($feeds as $feed) {
                $this->fetchFeed($feed);
            }
        });
    }
}
