<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;

class ShowFeedItem extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(FeedItem $item)
    {
        if (! is_null($item->content)) {
            return view('show-feed-item', compact('item'));
        }

        return redirect()->to($item->link);
    }
}
