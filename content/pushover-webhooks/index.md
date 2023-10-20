+++
title = "Format Webhooks for Pushover"
author = "@ssddanbrown"
date = 2023-10-20T16:00:00Z
updated = 2023-10-20T16:00:00Z
tested = "v23.08.3"
+++

This is a hack to adapt outgoing webhooks from BookStack so that they are directly compatible with the [pushover message API](https://pushover.net/api#messages).
It specifically targets pushover webhook endpoints, so this won't affect non-pushover webhooks.

To use, you simply need to create a webhook in BookStack as normal, but use `https://api.pushover.net/1/messages.json` as the "Webhook Endpoint".
Review the options below to ensure you've configured the code for your Pushover instance.

This hack demonstrates how the format of webhooks can be altered via the logical theme system. This code could be taken and easily altered to suit other platforms where desired.

#### Options

- Configure your Pushover API token & user key on lines 19-20, replacing the existing placeholder values between the string quotes.
- Additional options can be passed to the Pushover API via adding-to/altering the array passed back from the `formatWebhookDataForPushover` function.
  - These are explained in the [Pushover API documentation](https://pushover.net/api).
  - As an example, a `sound` parameter is set to use the tugboat notification sound for sent notifications. You can remove this to not define a specific notification sound.

#### Considerations

- Your pushover credentials will be stored within your `functions.php` file. You may want to consider who will have access to this file since they'd be able to access your pushover account via the API.

#### Code

{{<hack file="functions.php" type="logical">}}
