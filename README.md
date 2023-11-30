# laravel-resellerinterface


Requirements
•  PHP >= 8.1

•  Composer

•  Laravel >= 8.0

Installation
```bash
composer require tda/laravel-billwerk
```

## Usage
Inside Laravel:

```php
use Tda\LaravelBillwerk\Billwerk;
```
originally the keys are read from config in 'services.billwerk' as:
```php
('services.billwerk.client_id'),
('services.billwerk.client_secret'),
```
It is possible to send the credentials also, e.g.:
```php
Billwerk::credentials($client, $secret);
```
            
You can set on sandbox
```php
Billwerk::isSandbox();
```

## Features

All features use same layout as the API https://swagger.billwerk.io
### Methods

Following the API pattern, uses the GET, POST, PATCH, PUT and DELETE as method

#### GET
```php
$customer = Billwerk::customers()->get();
```
with parameters in path
```php
$customer = Billwerk::customers($id)->get();
```

with parameters in query
```php
$customer = Billwerk::customers()->filter(['search' => 'Max'])->get();
```

#### POST
```php
$customer = Billwerk::customers()->post([
    "FirstName": "Marcellus",
    "LastName": "Wallace",
    "Language": "en-US",
    "EmailAddress": "marcellus@example.com"
    ]);
```

#### PATCH
```php
$customer = Billwerk::customers()->patch([
    "FirstName": "Antonius",
    ]);
```

#### PUT
```php
$customer = Billwerk::customers()->put([
    "FirstName": "Glaucius",
    "LastName": "Caeser",
    "Language": "it-IT",
    "EmailAddress": "glaucius@example.com"
    ]);
```

#### DELETE
```php
$customer = Billwerk::customers($id)->delete();
```

You can check all methods in
```bash
tda/laravel-billwerk/Trait/Endpoints
```
