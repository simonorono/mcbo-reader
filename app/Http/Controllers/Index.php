<?php

namespace App\Http\Controllers;

use App\Models\FeedItem;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $items = FeedItem::orderByDesc('pubDate')->get();

        return view('index', compact('items'));
    }
}
