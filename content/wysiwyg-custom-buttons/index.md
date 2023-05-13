+++
title = "Custom WYSIWYG Editor Buttons"
author = "@ssddanbrown"
date = 2023-03-24T00:00:00Z
updated = 2023-03-24T00:00:00Z
tested = "v23.02"
+++

This hack provides an example of adding custom actions to the WYSIWYG page editor (TinyMCE).
By default, this adds an additional "..." overflow menu to the end of the WYSWIYG toolbar, which contains a single new 
"Insert Cat" button that has a custom icon. When clicked, this adds a placeholder kitten image into the page.

This is only meant to be an example, to be tweaked and modified to your use-case. 
The code is heavily commented for this reason.

For significant alterations, you'll likely want to review the [TinyMCE documentation](https://www.tiny.cloud/docs/tinymce/6/custom-toolbarbuttons/)
to understand the full set of available capabilities and actions within the TinyMCE editor API.

#### Considerations

- This heavily relies on internal methods of TinyMCE, which may change upon any BookStack release as we update the editor libraries.

#### Code

{{<hack file="head.html" type="head">}}
