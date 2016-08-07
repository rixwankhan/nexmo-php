# nexmo-php
A PHP library for communicating with the Nexmo REST API.

## Installation

You can install **nexmo-php** by downloading the source.

#### ZIP file:

download the source files which includes all dependencies.

Once you download the library, move the nexmo-php folder to your project
directory and then include the library file:

    require_once ('/path/to/nexmo-php/Services/Nexmo.php');

and you're good to go!

## A Brief Introduction

With the nexmo-php library, we've simplified interaction with the
Nexmo REST API. No need to manually create URLS.

## Quickstart

### Send an SMS

```php
<?php
// Install the library by downloading the .zip file to your project folder.
// This line loads the library
require_once ('/path/to/nexmo-php/Services/Nexmo.php');

$client = new Services_Nexmo();
$result = $client->sms(
    '8881231234', // Text this number
    '2221231234', // From a valid Nexmo virtual number
    'Hello World!'
);
echo $result;
```

### Make a Call

```php
<?php
// Install the library by downloading the .zip file to your project folder.
// This line loads the library
require_once ('/path/to/nexmo-php/Services/Nexmo.php');

$client = new Services_Nexmo();
$result = $client->call(
    '8881231234', // Call this number
    '2221231234', // From a valid Nexmo virtual number
	'http://your_domain.com/answer_url.xml' // A valid VXML file 
);
echo $result;
```

## Prerequisites

* PHP >= 5.5.25
* The PHP JSON extension
* The PHP CURL extension

# Getting help

If you've instead found a bug in the library or would like new features added, go ahead and open issues or pull requests against this repo!
