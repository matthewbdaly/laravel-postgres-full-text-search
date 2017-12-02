<?php

namespace Matthewbdaly\LaravelPostgresFullTextSearch\Traits;

trait Searchable
{
    public function scopeSearch($query, $search)
    {
        return $query;
    }
}
