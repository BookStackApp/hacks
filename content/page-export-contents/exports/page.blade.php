@extends('layouts.export')

@section('title', $page->name)

@section('content')
    <div dir="auto">

        <h1 class="break-text" id="bkmrk-page-title">{{$page->name}}</h1>
        @php
            $toc = (new \BookStack\Entities\Tools\PageContent($page))->getNavigation($page->html);
        @endphp

        @if(!empty($toc))
            <hr>
            <div style="color: #888;"><strong>Page Contents</strong></div>
            <ul>
                @foreach($toc as $tocEntry)
                    <li style="margin-left: {{ ($tocEntry['level'] - 1) * 16  }}px;"><a href="{{ $tocEntry['link'] }}">{{ $tocEntry['text'] }}</a></li>
                @endforeach
            </ul>
            <hr>
        @endif

        <div style="clear:left;"></div>

        {!! $page->renderedHTML ?? $page->html !!}
    </div>

    <hr>

    <div class="text-muted text-small">
        @include('exports.parts.meta', ['entity' => $page])
    </div>
@endsection