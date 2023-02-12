+++
title = "Username-based Login"
author = "@ssddanbrown"
date = 2022-11-25T20:00:00Z
updated = 2022-11-25T20:00:00Z
tested = "v22.10"
+++

This is a hack to BookStack, using the theme system, so that login presents itself as a username.
Upon login attempt, this will match to a user of `<username>@<configured-domain>` within the database.

#### Considerations

- This assumes all users in your BookStack instance shares the same email domain.
- This overrides a large part of the login form so be extra aware this will be overriding any default changes to BookStack upon updates.

#### Options

- Change the `EMAIL_DOMAIN` variable on line 7 of `functions.php` to be the common email domain used in your BookStack instance.

#### Code

{{<hack file="functions.php" type="logical">}}

{{<hack file="auth/parts/login-form-standard.blade.php" type="visual">}}
