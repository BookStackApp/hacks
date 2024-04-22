<!-- Check if there's a "iframe=true" query parameter in the request -->
@if(request()->query('iframe') === 'true')

    <!-- Set styles for when we're in "iframe mode" -->
    <!-- Most of these hide elements to provide a simple "embedded view" -->
    <style>
        #header,
        #sidebar,
        #content .button,
        .tri-layout-right,
        .grid.third.gap-xxl,
        .comments-container,
        #main-content > .mb-m,
        .tri-layout-mobile-tabs
        {
            display: none
        }

        .content-wrap.card
        {
            margin: 0;
            border: none;
            box-shadow: none;
        }
    </style>

    <!-- Add a script to control dark-mode via JavaScript -->
    <!-- if there's also a 'theme' query parameter -->
    @if(request()->query('theme'))
        <script nonce="{{ $cspNonce }}">
            // Use JavaScript to toggle the 'dark-mode' class on the HTML element to enable/disable
            // dark mode based on whether the `theme` query parameter is 'dark'.
            document.documentElement.classList.toggle('dark-mode', {{ request()->query('theme') === 'dark' ? 'true' : 'false' }});
        </script>
    @endif
@endif
