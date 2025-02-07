# HubSpot PHP API client

## haPiHP wrapper

[![Latest Stable Version](https://poser.pugx.org/fungku/hubspot/v/stable.svg)](https://packagist.org/packages/fungku/hubspot) [![Total Downloads](https://img.shields.io/packagist/dt/fungku/hubspot.svg)](https://packagist.org/packages/fungku/hubspot) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fungku/hubspot/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fungku/hubspot/?branch=master) [![License](https://poser.pugx.org/fungku/hubspot/license.svg)](https://packagist.org/packages/fungku/hubspot)

If you want to use the new COS or v2 endpoints, I am writing a completely new api client: https://github.com/fungku/hubspot-php

## V2 Create or Update 
Some V2 has been backported to work in the existing codebase.

Tested under Laravel 6/7/8 by Ausloan Devs.

## 29/11/2022 
DEPRECATE: ?hapi= Query Params
This Lib was updated to take in Private App Keys as the Hubspot API Key has been deprecated from 30/11/2022.
From now onwards Authorization Header is used instead of ?hapi=



## Setup

Run `composer require ausloans/hubspot`

Then add the following to config/app.php under 'Providers'
```php
Fungku\HubSpot\HubSpotServiceProvider::class,
```

## Example


```php
$hapikey = "demo";

$hubspot = new Fungku\HubSpot($hapikey);

// get 5 contacts' firstnames, offset by 50
$contacts = $hubspot->contacts()->get_all_contacts(array(
    'count' => 5, // defaults to 20
    'property' => 'firstname', // only get the specified properties
    'vidOffset' => '50' // contact offset used for paging
));
```

*Note:* The Hubspot class checks for a `HUBSPOT_APIKEY` environment variable if you don't include one during instantiation.


### haPiHP

#### Overview

A PHP client for HubSpot's APIs.  Docs for this client: [https://github.com/HubSpot/haPiHP/wiki/haPiHP](https://github.com/HubSpot/haPiHP/wiki/haPiHP).

General API reference documentation: [http://developers.hubspot.com/docs](http://developers.hubspot.com/docs).

### Contributors

* [adrianmott](https://github.com/adrianmott) (Adrian Mott)
* [chrishoult](https://github.com/chrishoult) (Christopher Hoult)
* [TheRealBenSmith](https://github.com/TheRealBenSmith) (Ben Smith)
* [ajorgensen](https://github.com/ajorgensen) (Andrew Jorgensen)
* [jprado](https://github.com/jprado)
* [thinkclay](https://github.com/thinkclay) (Clayton McIlrath)
* [adamgoose] (https://github.com/adamgoose) (Adam Engebretson)
