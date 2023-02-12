<?xml version="1.0"?>
<rss version="2.0">
   <channel>
      <title>Latest BookStack Pages</title>
      <link>{{ url('/') }}</link>
      <description>Latest pages in our BookStack instance</description>
      <lastBuildDate>{{ date(DATE_RSS) }}</lastBuildDate>
      @foreach($pages as $page)
        <item>
            <title>{{ $page->name }}</title>
            <link>{{ $page->getUrl() }}</link>
            <description>{{ $page->getExcerpt() }}</description>
            <pubDate>{{ $page->created_at->format(DATE_RSS) }}</pubDate>
            <guid>page#{{ $page->id }}</guid>
        </item>
      @endforeach
   </channel>
</rss>