+++
title = "Page Export Contents List"
author = "@ssddanbrown"
date = 2023-03-16T00:00:00Z
updated = 2023-03-16T00:00:00Z
tested = "v23.02.1"
+++

This hack uses the visual theme system to customize the page export template file, used for both PDF and HTML exports, to add a simple linked "Contents" list to the top of the file, generated from the headers within the document.

#### Considerations

- The "Page Contents" header is hardcoded in English.
- This contents list will not show page numbers for the PDF export.
- The contents will show when headers are used in page content.
- This hack uses internal an "PageContent" content class, and it's methods, which will likely change in future BookStack versions.

#### Code

{{<hack file="exports/page.blade.php" type="visual">}}
