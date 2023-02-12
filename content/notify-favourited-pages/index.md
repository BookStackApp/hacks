+++
title = "Notify Updates for Favourited pages"
author = "@ssddanbrown"
date = 2022-12-01T20:00:00Z
updated = 2022-12-01T20:00:00Z
tested = "v22.11"
+++


This hack sends out page update notification emails to all users that have marked that page as a favourite.

#### Considerations

- The sending of emails may slow down page update actions, and these could be noisy if a user edits a page many times quickly. 
- You may run into email system rate-limits with the amount of emails being sent.

#### Options

- You can customize the email message, if desired, by editing the lines of text within the toMail part at around lines 30-32 of the `functions.php` code.

#### Code

{{<hack file="functions.php" type="logical">}}
