+++
title = "Prune Revisions Command"
author = "@ssddanbrown"
date = 2024-05-23T13:00:00Z
updated = 2024-05-23T13:00:00Z
tested = "v24.05.1"
+++

This hack registers a custom command using the logical theme system, which will prune the revisions of a specific page
to just those with a changelog provided (in addition to the current revision), before resetting the revision numbers
across the remaining versions to be sequential without gaps. This will also reset the overall revision count on the page.

Once added, the command can be called like so from your BookStack install directory:

```bash
# Format
php artisan bookstack:prune-revisions {book-slug} {page-slug}

# Example
php artisan bookstack:prune-revisions team-notes code-snippets
```

#### Considerations

- The changes here will not be reflected in activity/audit logs, and existing related activity/audit logs will not be modified.
- This can delete data with no option to restore without resorting to backups.
- This could affect other features or processes that may potentially reference specific page revisions or numbers.

#### Code

{{<hack file="functions.php" type="logical">}}
