# Mail.ru OAuth2 client provider

[![Build Status](https://travis-ci.org/max107/oauth2-mailru.svg)](https://travis-ci.org/max107/oauth2-mailru)
[![Latest Version](https://img.shields.io/packagist/v/max107/oauth2-mailru.svg)](https://packagist.org/packages/max107/oauth2-mailru)
[![License](https://img.shields.io/packagist/l/max107/oauth2-mailru.svg)](https://packagist.org/packages/max107/oauth2-mailru)

This package provides [Mail.ru](http://my.mail.ru) integration for [OAuth2 Client](https://github.com/thephpleague/oauth2-client) by the League.

## Installation

```sh
composer require aego/oauth2-mailru
```

## Usage

```php
$provider = new Max107\OAuth2\Client\Provider\Mailru([
    'clientId' => '123456',
    'clientSecret' => 'f23ccd066f8236c6f97a2a62d3f9f9f5',
    'redirectUri' => 'https://example.org/oauth-endpoint',
]);
```
