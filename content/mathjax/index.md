+++
title = "Render LaTeX with MathJax"
author = "@codemicro"
date = 2023-02-27T00:00:00Z
updated = 2023-02-27T00:00:00Z
tested = "v23.02"
+++

This hack will allow LaTeX equations and markup to be rendered within a page on
Bookstack.

Inline math can be surrounded with `$` and math blocks can be surrounded with 
`$$`.

This can be used with both the WYSISYG editor and the Markdown editor and will
affect everything on a given page, meaning this can be used in titles,
book/chapter headings, etc.

#### Considerations

This loads MathJax the MathJax JavaScript from a CDN, and will do so for every 
page load.

Live previews of the rendered LaTeX markup will not be rendered in the Markdown
editor's preview.

Using this markup may create difficulties when using the search engine to find
certain pages.

#### Options

It is possible to configure MathJax as documented [here](https://docs.mathjax.org/en/latest/web/configuration.html).

#### Code

{{<hack file="head.html" type="head">}}
