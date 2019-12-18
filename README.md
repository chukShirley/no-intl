# NoI18N
Zend MVC module for php installations with no i18n extension

## Installation
```bash
$ composer require chuk-shirley/noi18n:dev-master
```

## Configuration
After installing the package, you'll need to add the module to your module config. This is typically found in /config/modules.config.php. Please ensure that this module is listed _after_ Zend\I18n.
```php
return [
    // ... other modules
    'Zend\I18n',
    'NoI18N',
];
```