# Eloquent Auditing

This Laravel 5 package allows model events to be logged to a database. It provides a trait that can be added to any Eloquent model allowing for chosen events to be logged using a polymorphic relationship.

## Installation

This package can be installed through Composer.
```bash
composer require mintbridge/eloquent-auditing
```

Once installed add the service provider and facade to your app config
```php
// config/app.php

'providers' => [
    '...',
    Mintbridge\EloquentAuditing\AuditServiceProvider::class,
];

'aliases' => [
    ...
    'Auditor' => Mintbridge\EloquentAuditing\AuditorFacade::class,
];
```

You'll also need to publish and run the migration in order to create the database table.
```
php artisan vendor:publish --provider="Mintbridge\EloquentAuditing\AuditServiceProvider" --tag="config"
php artisan vendor:publish --provider="Mintbridge\EloquentAuditing\AuditServiceProvider" --tag="migrations"
php artisan migrate
```

The configuration will be written to  ```config/auditing.php```. The options have sensible defaults but you should change the user to match the one used in your application.

## Usage

This package will record the events from your models. To do so your model must use the `Auditable` trait and implement `AuditableInterface`.

```php
use Mintbridge\EloquentAuditing\Auditable;
use Mintbridge\EloquentAuditing\AuditableInterface;

class Article extends Eloquent implements AuditableInterface {

    use Auditable;
...
```

The trait by default will use the event in ```config/auditing.php``` but you can overide this on a per model basis by adding a static ```$auditableEvents``` array of event names to the model. See http://laravel.com/docs/5.1/eloquent#events for the available events.

```php
use Mintbridge\EloquentAuditing\Auditable;
use Mintbridge\EloquentAuditing\AuditableInterface;

class Article extends Eloquent implements AuditableInterface {

    use Auditable;

    public static $auditableEvents = [
        'creating',
        'created',
        'updating',
        //...
    ];
...
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
