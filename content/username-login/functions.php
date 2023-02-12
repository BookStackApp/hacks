<?php

use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use Illuminate\Http\Request;

const EMAIL_DOMAIN = 'admin.com';

Theme::listen(ThemeEvents::WEB_MIDDLEWARE_BEFORE, function(Request $request) {

    // Transform a "username" on login request to an email input with pre-determined domain
    if ($request->path() === 'login' && $request->method() === 'POST') {
        $username = $request->input('username', '');
        if ($username) {
            $request->request->remove('username');
            $request->request->add(['email' => $username . '@' . EMAIL_DOMAIN]);
        }
    }
});