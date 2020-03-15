# A collection of some helper functions for Laravel


## Installation

```bash
composer require stobys/laravel-helpers
```

## Helpers

**carbon**

Shortcut for: `new Carbon` or `Carbon::parse()`
``` php
carbon('One year ago');
```


**user**

Shortcut for: `auth()->user()`
```php
user()->posts()->create([...]);
```


**faker**

Shortcut for: `Faker\Factory::create($locale)`
``` php
faker('pl_PL') -> realText(200);
```
