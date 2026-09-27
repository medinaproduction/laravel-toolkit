# Laravel Toolkit
This package is designed to help with general tools in MedinaProduction Laravel projects.

## Requirements

| Version | Laravel | PHP |
|---|---|---|
| 2.x | 13 | 8.3, 8.4, 8.5 |
| 1.x | 8 to 11 | 8.1 or later |

## Simple usage
Install the package from Packagist:
```
composer require medinaproduction/laravel-toolkit
```


## How to use (and develop)
To use this package and to continue developing the package, follow these steps:
1. In your projects `composer.json` file, make sure you have the following:
```
composer require mnsami/composer-custom-directory-installer
```
2. When question apperears: Do you trust "mnsami/composer-custom-directory-installer"... press `y`.
3. Add the following to the `composer.json` file.
```
"extra": {
    ...
    "installer-paths": {
        ...
        "./support/laravel-toolkit": ["medinaproduction/laravel-toolkit"],
    }
},
```
4. Also add the following to the `repositories` section:
```
"repositories": [
    ...
    {
        "type": "vcs",
        "url": "git@github.com:medinaproduction/laravel-toolkit.git"
    }
]
```
5. Finally, run the following command:
```
composer require medinaproduction/laravel-toolkit --prefer-source
```
6. A new clone of the repository is created under `support/laravel-toolkit/...`.

### Get tests to work
_Note: This guide is for testing in a standalone folder. If you want to run tests within the `support` folder, the process may be a bit different._
1. Naviage to package in termianl `cd support/laravel-toolkit`
2. Make sure you have run `composer update` in your package folder
3. Run tests `./vendor/bin/phpunit`
