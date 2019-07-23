The Neverending Exploration is an app built by PHP with [Twig Template](https://twig.symfony.com/) and [Google Sheets API](https://developers.google.com/sheets/api/guides/concepts). Google Sheets used as website database.

[View Live Demo](https://neverending.dindasigma.com/)

## Installation

Use the package manager [composer](https://getcomposer.org/) to install the dependency.

```bash
composer install
```

## Usage

First, you’ll have to have a Google account and create a new spreadsheet. The file contains two sheets as you can see in this [example file](https://docs.google.com/spreadsheets/d/1N-T3DsgFF_GktcVl6aKn1RryKt6LKpqpgvC9nJpFkFA/edit?usp=sharing).

Now that your Google Sheet is set up, you’ll need to link the spreadsheet to your website by defining some variables in config.php

```php
!defined('ASSETS_URL') && define('ASSETS_URL', 'my_assets_url');
!defined('APPLICATION_NAME') && define('APPLICATION_NAME', 'my_application_name');
!defined('CREDENTIAL_URL') && define('CREDENTIAL_URL', __DIR__ . '/credentials.json');
!defined('SPREEDSHEET_ID') && define('SPREEDSHEET_ID', 'my_spreadsheed_id');
```
- ASSETS_URL is our baseurl for assets e.g `http://yourdomain.tld/assets`
- APPLICATION_NAME is our application name e.g `The Neverending Exploration`
- CREDENTIAL_URL is our client configuration for Google Sheets API, you can get it by enabling the Google Sheets API from this [URL](https://developers.google.com/sheets/api/quickstart/php). Save the file credentials.json to our root project.
- SPREEDSHEET_ID is our spreedsheet file ID which created before. For example, consider the following URL that references a Google Sheets spreadsheet:
_https://docs.google.com/spreadsheets/d/**spreadsheetId**/edit#gid=0_


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)