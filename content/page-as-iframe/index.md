+++
title = "Overloading CSS to view a book page in a iframe"
author = "@vincent"
date = 2023-03-20T00:00:00Z
updated = 2023-03-20T00:00:00Z
tested = "v22.11.1"
+++

This hack will add classes on the HTML root element, and hide some components when displayed inside an iframe.

This can be useful use Bookstack as a Knowledge Base, and you want to integrate contextual help for your app, with content from Bookstack.

#### Considerations

This works via JavaScript, so is not assured to run since a user could have
JavaScript disabled although this is relatively rare.

### Usage

Use the original page url, with the GET query params `iframe=true` and `theme=dark|default`.

For example: `bookstack-instance.io/books/my-book/page/my-page?iframe=true&theme=dark`

#### Code

{{<hack file="head.html" type="head">}}
