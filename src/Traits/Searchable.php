<?php

namespace Matthewbdaly\LaravelPostgresFullTextSearch\Traits;

trait Searchable
{
    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }
        return $query;
    }
}
