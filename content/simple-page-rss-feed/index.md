+++
title = "Simple Latest Pages RSS Feed"
author = "@ssddanbrown"
date = 2023-02-12T20:00:00Z
updated = 2023-02-12T20:00:00Z
tested = "v22.11.1"
+++


This is a hack to add a simple latest-page RSS feed to the BookStack using the logical theme system. A YouTube video covering the build and use of this customization [can be found here](https://www.youtube.com/watch?v=VYyyvaZTs_4).

#### Considerations

This does not take into account access control at all or enforce login, the RSS data endpoint will be publicly accessible. The code will effectively use the permissions of the "Guest" user.

#### Options

- The `25` in `functions.php` controls the count of rss feed items to show.
- `created_at` in `functions.php` can be changed to `updated_at` to instead reflect the latest updated pages.

#### Code

{{<hack file="functions.php" type="logical">}}

{{<hack file="rss.blade.php" type="visual">}}
