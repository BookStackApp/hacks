+++
title = "Notify Page Updates for Tagged Books"
author = "@ssddanbrown"
date = 2022-12-01T20:00:00Z
updated = 2023-11-20T22:00:00Z
tested = "v23.10.4"
+++


This allows you to configure notifications to be sent to users within roles defined via tags applied to parent books.
For example, if a tag with name `Notify` and value `Admins, Viewers` is applied to a book, updates to pages within will be notified via email to all users within the "Admins" and "Viewers" roles.

#### Considerations

- The sending of emails may slow down page update actions, and these could be noisy if a user edits a page many times quickly. 
- You may run into email system rate-limits with the amount of emails being sent.
- By default, languages/translations are not handled in this example.
- This could be abused to send a mass of emails to user groups.
- You may prefer to use the in-platform notification system which was added in [BookStack v23.08](/blog/bookstack-release-v23-08/).

#### Options

- You can customize the email message, if desired, by editing the lines of text within the toMail part at around lines 31-34 of the `functions.php` code.

#### Code

{{<hack file="functions.php" type="logical">}}
