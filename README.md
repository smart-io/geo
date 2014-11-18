# SmartData

[![Build Status](https://img.shields.io/travis/mysmartdata/php-smartdata/master.svg?style=flat)](https://travis-ci.org/mysmartdata/php-smartdata)
[![Latest Stable Version](http://img.shields.io/packagist/v/smartdata/smartdata.svg?style=flat)](https://packagist.org/packages/smartdata/smartdata)
[![Total Downloads](https://img.shields.io/packagist/dt/smartdata/smartdata.svg?style=flat)](https://packagist.org/packages/smartdata/smartdata)
[![License](https://img.shields.io/packagist/l/smartdata/smartdata.svg?style=flat)](https://packagist.org/packages/smartdata/smartdata)

SmartData is databases from Open Data providers compiled into easy to use PHP objects.

1. [Features](#features)
2. [Sources](#sources)
3. [Requirements](#requirements)
4. [Installation](#installation)
5. [Country](#country)
6. [Region](#region)
7. [IP](#ip)
8. [Geolocation](#geolocation)

## Features

 * Multiple languages (Currently only supports English, French and German).
 * Country Database
 * Region Database (Currently only for Canada and the United States). 
 * IP Geolocation (With MaxMind)

## Sources

 * [GeoNames](http://www.geonames.org/)
 * [Wikipedia](http://en.wikipedia.org/)
 * [OpenStreetMap](http://www.openstreetmap.org/)

## Requirements

SmartData does not require a database, but instead, uses JSON files.
 
This library uses PHP 5.6+.

## Installation

You need to install the SmartData library through composer. To do so, add the following lines to your 
composer.json file.

```javascript
{
    "require": {
       "smartdata/smartdata": "dev-master"
    }
}
```

To download or update the current data, use the following command.

```shell
php vendor/bin/smartdata data:update
```

## Country

Database of all countries in the world.

__Properties__

 * Name
 * Short Code (Alpha-2 code)
 * Code (Alpha-3 code)
 * Latitude
 * Longitude
 * Bounding Box

__Examples__

Get a list of all countries.

```php
$countryCollection = (new SmartData)->getCountryRepository()->findAll();
```

Get country name in english.

```php
foreach ($countryCollection as $country) {
   echo $country->getNames()->get('en');
}
```

Order by country name in english.

```php
$countryCollection->orderByName();
```

## Region

Database of all States, Federal Districts and Territories in the United States, Provinces and Territories in Canada.

__Properties__

 * Name
 * Code (Alpha-2 code)
 * Country
 * Type
 * Latitude
 * Longitude
 * Bounding Box

__Examples__

Get a list of all regions in the US.

```php
$smartData = new SmartData;
$country = $smartData->getCountryRepository()->findByCode('US');
$regionCollection = (new SmartData)->getRegionRepository()->findByCountry($country);
```

Get region name amd type in english.

```php
foreach ($regionCollection as $region) {
   echo $region->getNames()->get('en') . " is a " . 
       $region->getType()::class . " of the " . 
       $country->getNames()->get('en);
}
```
 
## IP

IP address object. Can get the real IP of the server from icanhazip.com, practical for development.
 
__Examples__

Get the IP from `$_SERVER['REMOTE_ADDR']`.

```php
$smartData = new SmartData;
$ip = $smartData->getIpRepository()->findIp();
```
 
Get the network IP from icanhazip.com.

```php
$smartData = new SmartData;
$ip = $smartData->getIpRepository()->findRealIp();
```

## Geolocation

Get a Geolocation by IP (Uses MaxMind).

__Properties__

 * Latitude
 * Longitude
 * Country

__Examples__

Get a Geolocation from the IP.

```php
$smartData = new SmartData;
$ip = $smartData->getIpRepository()->findIp();
$geolocation = $smartData->getGeolocationRepository()->findByIp($ip);
```

Get country from Geolocation.

```php
echo "You are in this country: " . $geolocation->getCountry()->getNames()->get('en');
```
