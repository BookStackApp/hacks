<?php

use BookStack\Actions\ActivityType;
use BookStack\Auth\User;
use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use BookStack\Notifications\MailNotification;
use BookStack\Theming\ThemeEvents;
use Illuminate\Notifications\Messages\MailMessage;

// This customization notifies page-updates via email to users that have marked
// that updated page as a favourite.

// This notification class represents the notification that'll be sent to users.
// The text of the notification can be customized within the 'toMail' function.
class PageUpdatedNotification extends MailNotification {

    protected Page $page;
    protected User $updater;

    public function __construct(Page $page, User $updater)
    {
        $this->page = $page;
        $this->updater = $updater;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('BookStack page update notification')
            ->line("The page \"{$this->page->name}\" has been updated by \"{$this->updater->name}\"")
            ->action('View Page', $this->page->getUrl());
    }
}

// This function does the work of sending notifications to the relevant users that have
// marked the given page as a favourite.
function notifyThoseThatHaveFavouritedPage(Page $page) {
    // Find those we need to notify, and find the current updater of the page
    $userIds = $page->favourites()->pluck('user_id');
    $usersToNotify = User::query()->whereIn('id', $userIds)
        ->where('id', '!=', $page->updated_by)
        ->get();
    $updater = User::query()->findOrFail($page->updated_by);

    // Send a notification to each of the users we want to notify
    foreach ($usersToNotify as $user) {
        $user->notify(new PageUpdatedNotification($page, $updater));
    }
}

// Listen to page update events and kick-start our notification logic
Theme::listen(ThemeEvents::ACTIVITY_LOGGED, function(string $type, $detail) {
    if ($type === ActivityType::PAGE_UPDATE && $detail instanceof Page) {
        notifyThoseThatHaveFavouritedPage($detail);
    }
});
