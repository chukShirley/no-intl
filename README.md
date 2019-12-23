# no-intl
Zend MVC module for php installations with no i18n extension

## Installation
```bash
$ composer require chuk-shirley/no-intl
```

## Configuration
After installing the package, you'll need to add the module to your module config. This is typically found in /config/modules.config.php. Please ensure that this module is listed _after_ Zend\I18n.
```php
return [
    // ... other modules
    'Zend\I18n',
    'NoIntl',
];
```

If you would like to use a locale other than `en_US_POSIX`, you'll need to copy the configuration file from /config/no_intl.global.php.dist to your application's local config directory, remove the .dist suffix, and specify your locale in the configuration array.
```php
return [
    'no_intl' => [
        'default_locale' => 'en_US_POSIX', // Rename to different locale (e.g. fr-CA, fr-FR, etc.)
    ],
];
```