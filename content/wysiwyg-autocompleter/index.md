+++
title = "WYSIWYG Editor Autocompleter"
author = "@razem-io"
date = 2023-05-04T23:00:00Z
updated = 2023-05-04T23:00:00Z
tested = "v23.02"
+++

This hack adds custom autocompleter support to the WYSIWYG page editor (TinyMCE). An autocompleter displays suggestions while the user is typing. Suggestions are shown when the trigger character is entered after a space or at the start of a new line (such as ' :'). Pressing the Escape key will close the autocompleter.

This hack provides significant examples of TinyMCE (The library used for the WYSIWYG) content manipulation and extension.
The code is heavily commented to assist as a helpful example.
For significant alterations, you'll likely want to review the [TinyMCE documentation](https://www.tiny.cloud/docs/tinymce/6/autocompleter/)
to understand the full set of available capabilities and actions within the TinyMCE editor API.

#### Considerations

- This heavily relies on internal methods of TinyMCE, which may change upon any BookStack release as we update the editor libraries.
- All logic is within the WYSIWYG editor, and therefore you won't get the same functionality via the API or other editors.
- The syntax & code used likely won't be cross-compatible with the markdown editor.
- This has been tested to some degree but there's a reasonable chance of bugs or side affects, since there's quite a lot going on here.
- There's a lot of custom code here. You could instead put this code (without the HTML `<script>` tags) in an external JavaScript file and then just use a single `<script src="/path/to/file.js"></script>` within the custom head setting.

#### Code

{{<hack file="head.html" type="head">}}
