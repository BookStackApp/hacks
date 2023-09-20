+++
title = "Automatic Redirection"
author = "@Fabien4941"
date = 2023-09-20T00:00:00Z
updated = 2023-09-20T00:00:00Z
tested = "v23.09.0"
+++

This script offers an automatic redirection feature to a specific URL after a configurable delay. It displays a multilingual message during the waiting period to enhance the user experience. The language of the message dynamically adjusts based on the `lang` attribute of the `<html>` tag, making it adaptable for multilingual sites.

You can use it by adding the "redirect" class to an anchor tag like so:
```html
<a class="redirect" href="https://google.com">Example</a>
```

The content of this tag will be altered by the script to show a redirection message. After the set delay, the user will be automatically taken to the specified URL, in this case, https://google.com

#### Considerations

- The script operates using JavaScript, so users with JavaScript disabled won't experience the redirection feature.
- The delay for redirection can be adjusted by modifying a variable at the beginning of the script.
- The message is displayed based on the `lang` attribute of the `<html>` tag. Currently supported languages include English, French, and Spanish, but more can be added with ease.
- The redirection feature will not activate while the page is in edit mode, ensuring no interruptions for content editors, regardless of whether they are using the Markdown or WYSIWYG editor.

#### Instructions for WYSIWYG Editor

To use this feature with the WYSIWYG editor:
- Click the button to edit the source code of the page.
- Manually add the class "redirect" to the desired link. This will enable the automatic redirection feature for that specific link.

#### Options

The delay before redirection and the available languages for the message can be adjusted within the script to fit different requirements. 

#### Code

{{<hack file="head.html" type="head">}}