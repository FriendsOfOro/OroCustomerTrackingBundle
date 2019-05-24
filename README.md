 Oro Customer Tracking Bundle
==============================
This bundle adds support for user tracking code injection.

Currently supported trackers are:
* [Google Analytics](https://analytics.google.com/analytics/web/)
* [Google Tag Manager (GTM)](https://tagmanager.google.com/)
* [LogRocket](https://logrocket.com/)
* [Hotjar](https://www.hotjar.com/)
* [Fullstory](https://www.fullstory.com/) 

For applicable trackers, the currently logged-in user will also be provided with the tracking payload.

NOTE: [Google Analytics Ecommerce Tracking](https://support.google.com/analytics/answer/1009612?hl=en) **is not currently supported** 

Inspired by the [OroCommerce Analytics/GTM Bundle](https://github.com/DivanteLtd/orocommerce-ga) by DivanteLtd (currently unmaintained and Oro 3.X incompatible)

Requirements
-------------------
* Oro Platform 3.X

Installation and Usage
-------------------
**NOTE: Adjust instructions as needed for your local environment**

1. Add to Composer repository list in `composer.json`:
    ```json
    "repositories": {
       "customer-tracking-bundle": {
            "type": "vcs",
            "url": "https://github.com/friendsoforo/OroCustomerTrackingBundle.git",
            "no-api": true
       }          
    }
    ```
1. Install via Composer:
    ```bash
    composer require friendsoforo/oro-customer-tracking-bundle
    ```
1. Purge Oro cache:
    ```bash
    php bin/console cache:clear --env=prod
    ```
1. Login to Oro Admin
1. Navigate to **System Configuration => Friends of Oro => Customer Tracking/Analytics**
1. Configure the required Tracking Providers as needed
1. Save the configuration and verify that they are now appearing on the frontend website

Licence
-------------------
[MIT - MIT License](./LICENSE)