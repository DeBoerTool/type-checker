# Type checker for PHP

## Installation

You can install the package via composer:

```bash
composer require dbt/type-checker
```

## Usage

Check scalar types:

``` php
Type::of('some-string')->is('string'); // true

// but you don't need to use the factory function if you don't want to:

$type = new Type(12);
$type->is('float'); // false
```

And callables:

```php
Type::of('strstr')->is('callable'); // true
Type::of('strstr')->is('string'); // also true
```

And classes:

```php
Type::of($myClass)->is(MyClass::class);
Type::of($myClass)->is(MyInterface::class);
```

Throw on failure:

```php
Type::of('my string')->mustBe('float'); // Throws WrongType exception
```

### Testing

``` bash
composer test
```

## Etc.

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
