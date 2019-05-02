## Laravel Kube Installer
[![Packagist License](https://poser.pugx.org/alexwijn/laravel-kube-installer/license.png)](http://choosealicense.com/licenses/mit/)
[![Latest Stable Version](https://poser.pugx.org/alexwijn/laravel-kube-installer/version.png)](https://packagist.org/packages/alexwijn/laravel-kube-installer)
[![Total Downloads](https://poser.pugx.org/alexwijn/laravel-kube-installer/d/total.png)](https://packagist.org/packages/alexwijn/laravel-kube-installer)

This package will add a new command to prepare a Laravel Application for a Kubernetes enviroment with persisten volumes.

## Installation

Require this package with composer.

```shell
composer require alexwijn/laravel-kube-installer
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel 5.5+:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
Alexwijn\KubeInstaller\ServiceProvider::class,
```

## Commands

At the moment we support the following command:

- *kube:compile* - Compress the storage folder to be used by the install command later.
- *kube:initialize* - This command wil at default migrate the application with seeds and also restore the above storage folder.
- *kube:install* - This command will only run the migrations by default.

All of the above commands can be customized by publishing the configuration file for this package.

```shell
php artisan vendor:publish Alexwijn\KubeInstaller\ServiceProvider
```
