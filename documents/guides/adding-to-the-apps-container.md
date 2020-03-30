# Adding to the app's container

```php
$container = $app->getContainer();
$container->set('myService', function () {
    $settings = 'Helo';
    return $settings;
});

echo $container->get('myService');
```
