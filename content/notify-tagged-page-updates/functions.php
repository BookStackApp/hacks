<?php

use BookStack\Activity\ActivityType;
use BookStack\Activity\Models\Tag;
use BookStack\Activity\Notifications\Messages\BaseActivityNotification;
use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Users\Models\Role;
use BookStack\Users\Models\User;
use Illuminate\Notifications\Messages\MailMessage;

// This customization notifies page updates to users within roles named via a tag  on a parent book.
// For example, If a tag, with name `Notify` and value `Admins, Viewers` is applied to a book, updates to pages within
// will be notified via email to all users within the "Admins" and "Viewers" roles.
// Note: This is not officially supported, may break upon update, and the email sending may slow down operations.
//       Also, users could be spammed with emails on repeated updates.
//       Also, might hit email system rate-limits.
//       Also, this relies on role names being stable.

// This notification class represents the notification that'll be sent to users.
// The text of the notification can be customized within the 'toMail' function.
class PageUpdateNotification extends BaseActivityNotification {
    public function toMail(User $notifiable): MailMessage
    {
        /** @var Page $page */
        $page = $this->detail;
        $updater = $this->user;

        return (new MailMessage())
            ->subject('BookStack page update notification')
            ->line("The page \"{$page->name}\" has been updated by \"{$updater->name}\"")
            ->action('View Page', $page->getUrl());
    }
}

// This function does the work of sending notifications to the
// relevant users that are in roles denoted by a tag on the parent book.
function notifyRequiredUsers(Page $page) {

    // Get our relevant tag
    /** @var ?Tag $notifyTag */
    $notifyTag = Tag::query()
        ->where('entity_type', '=', 'book')
        ->where('entity_id', '=', $page->book_id)
        ->where('name', '=', 'notify')
        ->first();
    if (!$notifyTag) {
        return;
    }

    // Get the roles named via the tag
    $roleNames = array_filter(array_map(fn ($str) => trim($str), explode(',', $notifyTag->value)));
    $roleIds = Role::query()->whereIn('display_name', $roleNames)->pluck('id');
    if (count($roleNames) === 0 || $roleIds->isEmpty()) {
        return;
    }

    // Get the users we want to notify, and the user that updated the page
    $usersToNotify = User::query()
        ->whereExists(function ($query) use ($roleIds) {
            $query->select('user_id')
                ->from('role_user')
                ->whereColumn('users.id', '=', 'role_user.user_id')
                ->whereIn('role_id', $roleIds);
        })
        ->where('id', '!=', $page->updated_by)
        ->get();
    $updater = User::query()->findOrFail($page->updated_by);

    // Send a notification to each of the users we want to notify
    foreach ($usersToNotify as $user) {
        $user->notify(new PageUpdateNotification($page, $updater));
        usleep(100000); // Slight 0.1s delay to help rate limit abuse
    }
}

// Listen to page update events and kick-start our notification logic
Theme::listen(ThemeEvents::ACTIVITY_LOGGED, function (string $type, $detail) {
    if ($type === ActivityType::PAGE_UPDATE && $detail instanceof Page) {
        notifyRequiredUsers($detail);
    }
});
