# laravel-postgres-full-text-search

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-postgres-full-text-search.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-postgres-full-text-search)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-postgres-full-text-search/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-postgres-full-text-search?branch=master)

Add Postgres full text search to your models.

Installation
------------

```
composer require matthewbdaly/laravel-postgres-full-text-search
```

Usage
-----

This package provides a trait that you can add to your models. You need to specify the searchable fields as follows:

```php
protected $searchable = [
    'title',
    'content'
];
```

You can then use the `search($text)` scope with Eloquent to search against the searchable fields.
