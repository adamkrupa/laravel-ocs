# Laravel Oktawave Cloud Storage

## Instalation

```bash
composer require krupa/laravel-ocs
```

## Usage
Add a new config for OCS to `config/filesystems.php`
```php
'disks' => [
   'ocs' => [
      'driver'    => 'ocs',
      'user'      => env('OCS_USER'),
      'password'  => env('OCS_PASSWORD'),
      'project'    => env('OCS_PROJECT'),
      'container' => env('OCS_CONTAINER'),
   ],
]
```

Add credentials to `.env`
```dotenv
OCS_USER=
OCS_PASSWORD=
OCS_PROJECT=
OCS_CONTAINER=
```