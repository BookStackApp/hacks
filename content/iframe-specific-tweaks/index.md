+++
title = "IFrame Specific Tweaks"
author = "@vincent @ssddanbrown"
date = 2023-03-20T00:00:00Z
updated = 2024-04-22T00:00:00Z
tested = "v24.02.3"
+++

This hack will add custom styles & scripts, hiding many parts of the interface while adding additional light/dark mode control,
intended to provide a cleaner view that's suitable for use within iframes embedded on external pages.

This can be useful if you use BookStack as a knowledge base, and you want to integrate contextual help for your app, with content from BookStack.

#### Considerations

- The forced dark/light mode control works via JavaScript, so will not run where a user has JavaScript disabled although this is relatively rare.
- This specific example will only affect the loaded page view, not subsequent clicks to other parts of the application within the iframe.

#### Usage

Use the original page url, with the GET query params `iframe=true` and `theme=dark|light`. For example:

```html
<iframe src="https://docs.example.com/books/my-book/page/my-page?iframe=true&theme=dark"></iframe>
```

The styles and script logic provided is just an example starting point. You should customize these to suit your own needs.

#### Code

{{<hack file="layouts/parts/base-body-start.blade.php" type="visual">}}
