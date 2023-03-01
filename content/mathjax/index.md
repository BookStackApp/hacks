+++
title = "Render TeX/LaTeX Mathematics with MathJax"
author = "@codemicro"
date = 2023-02-27T00:00:00Z
updated = 2023-02-27T00:00:00Z
tested = "v23.02"
+++

This hack will allow TeX/LaTeX mathematic markup to be rendered within a page on
BookStack using [MathJax](https://www.mathjax.org/).

Inline math can be surrounded with `$` and math blocks can be surrounded with 
`$$` or `\[...\]`. Additionally LaTeX environments and `\ref{...}` commands will be processed.

This can be used with both the WYSIWYG editor and the Markdown editor and will
affect everything on a given page, meaning this can be used in titles,
book/chapter headings, etc.

#### Considerations

- This relies on JavaScript to parse and render content on page load.
- This loads MathJax the MathJax JavaScript from an external CDN (jsdelivr.net) server.
- Math rendering may not work in all areas of the application, notedly:
  - No rendering in the Markdown live preview.
  - No rendering in many export formats, including PDF.
- This could introduce rendering of Math where not intended.

#### Options

It is possible to further [configure MathJax as documented here](https://docs.mathjax.org/en/latest/web/configuration.html).

#### Code

{{<hack file="head.html" type="head">}}
