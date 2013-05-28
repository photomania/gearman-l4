Gearman-L4
==========

Gearman-L4 is a GearmanClient (PECL extension) wrapper for Laravel 4.
It does not add functionality and only exposes the native GearmanClient instance from the PECL extension to the Laravel application.

Installation
============

Add `photomania/gearman-l4` as a requirement to composer.json:

```json
{
    "require": {
        "photomania/gearman-l4": "dev-master"
    }
}
```
And then run `composer update photomania/gearman-l4`.

Once Composer has installed the packages it needs, you need to register Gearman-L4 with your Laravel application.
Open up `app/config/app.php`, find the `providers` key and add:

```php
'Photomania\GearmanL4\GearmanL4ServiceProvider'
```

Configuration
=============

You can alter configuration options (such as server hostnames and ports) by publishing the config file.

```php
php artisan config:publish photomania/gearman-l4
```

This will copy the default configuration file to `app/config/packages/photomania/gearman-l4/config.php`.
