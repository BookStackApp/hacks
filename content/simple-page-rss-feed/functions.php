<?php

use BookStack\Entities\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/rss/pages/new', function() {
    $pages = Page::query()
        ->visible()
        ->orderBy('created_at', 'desc')
        ->take(25)
        ->get();

    return response()->view('rss', ['pages' => $pages], 200, ['Content-Type' => 'text/xml']);
});