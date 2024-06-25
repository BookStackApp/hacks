+++
title = "WYSIWYG Docx Import"
author = "@ssddanbrown"
date = 2023-06-07T09:00:00Z
updated = 2023-06-07T09:00:00Z
tested = "v24.05.2"
+++

This hack adds the ability to import ".docx" files into the WYSIWYG editor,
by dragging and dropping a "docx" file into the editor area. 
The file contents are converted to HTML then inserted into the editor at the current cursor position.

Conversion is performed browser-side using the [mammoth.js](https://github.com/mwilliamson/mammoth.js) library.
Warning messages from the conversion will be logged to the browser console, and a popup warning notification will advise of this.

#### Considerations

- This hack uses an externally hosted library, hosted on `jsdelivr.net`. You could host this locally instead if desired.
- The conversion is relatively simplistic, to result in clean HTML for use in BookStack. Not all formatting is supported by the conversion and you'll likely loose layout or formatting. Don't expect a replica result in BookStack, this is more for easy importing of existing content.
- Images will be within content, base64 included, until save when BookStack will attempt to extract them out. This may cause editor performance to be particular slow until first save after import.
- You will likely see a "Dropped file type is not supported" warning message pop-up in the editor.

#### Code

{{<hack file="head.html" type="head">}}
