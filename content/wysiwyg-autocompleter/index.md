+++
title = "WYSIWYG Editor Autocomplete Suggestions"
author = "@razem-io"
date = 2023-05-04T16:00:00Z
updated = 2023-05-04T16:00:00Z
tested = "v23.05"
+++

This hack adds custom autocomplete suggestions to the WYSIWYG page editor (TinyMCE). An autocomplete popup box will show after a "trigger character" (`:` as configured by default in this hack) is entered after a space, or at the start of a line. Pressing the Escape key will close the autocompleter.

By default, two autocomplete options are configured: `Cat 1` and `Cat 2`.
Entering `:c` within the editor will show the autocomplete containing these two options.
These options can be configured from line 21 in the code.

This hack serves as a good example of registering autocomplete options with TinyMCE (The library used for the WYSIWYG).
The code is heavily commented to assist as a helpful example.
You may want to review the [TinyMCE Autocompleter documentation](https://www.tiny.cloud/docs/tinymce/6/autocompleter/)
to understand the full set of capabilities and options available.

#### Considerations

- This heavily relies on internal methods of TinyMCE, which may change upon any BookStack release as we update the editor libraries.
- All logic is within the WYSIWYG editor, and therefore you won't get the same functionality via other editors.

#### Code

{{<hack file="head.html" type="head">}}
