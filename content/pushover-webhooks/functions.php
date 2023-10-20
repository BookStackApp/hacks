<?php

use BookStack\Activity\Models\Loggable;
use BookStack\Activity\Models\Webhook;
use BookStack\Activity\Tools\WebhookFormatter;
use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;
use BookStack\Users\Models\User;

// Format the usual BookStack webhook data into a format that
// pushover can accept.
function formatWebhookDataForPushover(array $defaultWebhookData): array
{
    // Within here you can define and provide back any of the variables
    // supported by the pushover API as defined here:
    // https://pushover.net/api#messages
    return [
        // Required
        'token'   => 'axxxxxxxxxxxxxxxxxxxxxxxxxxxxx', // Replace value with an app/api token/key
        'user'    => 'uxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', // Replace value with user/group key
        'message' => $defaultWebhookData['text'],

        // Any other optional parameters
        'url'   => $defaultWebhookData['url'] ?? null,
        'sound' => 'tugboat',
    ];
}

// Listen for webhook call events in BookStack, so we can manipulate the
// data before it's sent to the webhook endpoint.
Theme::listen(ThemeEvents::WEBHOOK_CALL_BEFORE, function (
    string $event,
    Webhook $webhook,
    string|Loggable $detail,
    User $initiator,
    int $initTime,
) {
    // Override the data format if going to a pushover API endpoint
    if (str_starts_with($webhook->endpoint, 'https://api.pushover.net')) {
        $defaultData = WebhookFormatter::getDefault($event, $webhook, $detail, $initiator, $initTime);
        return formatWebhookDataForPushover($defaultData->format());
    }

    // Otherwise return null to leave the webhook data alone
    return null;
});