# [ABANDONED] Instagram PHP Scrapper

**This package is abandoned. Use original [postaddictme/instagram-php-scraper](https://github.com/postaddictme/instagram-php-scraper)**

This is the fork of [`postaddictme/instagram-php-scraper`](https://github.com/postaddictme/instagram-php-scraper) repo.
Description from original:

> This library based on Instagram web version. We develop it because nowadays it is hard to get approved Instagram application. 
> The purpose support every feature that web desktop and mobile version support. 


## Fork Information

This fork provides ability to specify custom HTTP client for handling requests.
Clients for [`guzzlehttp/guzzle`](https://github.com/guzzle/guzzle) and
[`mashape/unirest-php`](https://github.com/Mashape/unirest-php) are included.

Also, proxy methods are removed from `Instagram` class: proxy should be configured for HTTP client
(following the principle of separation of concerns) 


## Installation

### Using composer

```sh
composer require downace/instagram-php-scraper
```

### If you don't have composer
You can download it [here](https://getcomposer.org/download/).


## Examples

You can see examples of using original library [here](https://github.com/postaddictme/instagram-php-scraper/tree/master/examples).

With Unirest ([`mashape/unirest-php`](https://github.com/Mashape/unirest-php) is required):

```php
$insta = new Instagram(new \InstagramScraper\HttpClient\UnirestClient());
```

With Guzzle ([`guzzlehttp/guzzle`](https://github.com/guzzle/guzzle) is required):

```php
// \GuzzleHttp\Client with default options will be used
$insta = new Instagram(new \InstagramScraper\HttpClient\GuzzleClient());

// You can provide options for \GuzzleHttp\Client constructor
$insta = new Instagram(new \InstagramScraper\HttpClient\GuzzleClient([ 'timeout' => 5 ]));

// Or pass your own instance of \GuzzleHttp\ClientInterface:
$insta = new Instagram(new \InstagramScraper\HttpClient\GuzzleClient($myClient));
```

Using proxy:

```php
// With Guzzle.
$insta = new Instagram(new \InstagramScraper\HttpClient\GuzzleClient([
    'proxy' => 'http://user:pass@localhost:8125'
]));

// With Unirest
Request::proxy('localhost', 8125, CURLPROXY_HTTP);
Request::proxyAuth('user', 'pass');
$insta = new Instagram(new \InstagramScraper\HttpClient\UnirestClient());
```
