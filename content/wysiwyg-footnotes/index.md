+++
title = "WYSIWYG Editor Footnotes"
author = "@ssddanbrown"
date = 2023-05-03T23:00:00Z
updated = 2023-05-03T23:00:00Z
tested = "v23.05"
+++

This hack adds some level of "footnote" support to the WYSIWYG editor.
A new "Footnote" button is added to the toolbar, next to the "Italic" button, that allows you to
insert a new footnote reference. Footnotes will automatically be listed at the bottom of the page content.
The reference numbering is automatic, chronologically from page top to bottom.
New references will change existing numbering if inserted before.

This hack provides significant examples of TinyMCE (The library used for the WYSIWYG) content manipulation and extension.
The code is heavily commented to assist as a helpful example.
For significant alterations, you'll likely want to review the [TinyMCE documentation](https://www.tiny.cloud/docs/tinymce/6/custom-toolbarbuttons/)
to understand the full set of available capabilities and actions within the TinyMCE editor API.

#### Considerations

- This heavily relies on internal methods of TinyMCE, which may change upon any BookStack release as we update the editor libraries.
- All logic is within the WYSIWYG editor, and therefore you won't get the same functionality via the API or other editors.
- The syntax & code used likely won't be cross-compatible with the markdown editor.
- The footnotes list will be generated when content is saved from the editor, so is not updated live but should always be auto-updated before save.
- This has been tested to some degree but there's a reasonable chance of bugs or side affects, since there's quite a lot going on here.
- There's a lot of custom code here. You could instead put this code (without the HTML `<script>` tags) in an external JavaScript file and then just use a single `<script src="/path/to/file.js"></script>` within the custom head setting.

#### Code

{{<hack file="head.html" type="head">}}
