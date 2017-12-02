<?php

namespace Matthewbdaly\LaravelPostgresFullTextSearch\Traits;

trait Searchable
{
    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }
        $lang = config('fulltextsearch.language');
        $table = $this->getTable();
        $searchable = $this->searchable;
        foreach ($searchable as $k => $v) {
            $searchable[$k] = "to_tsvector('$lang', $table.$v)";
        }
        array_unshift($searchable, $table.".".$this->getKeyName());
        return $query->selectRaw(implode(", ", $searchable));
    }
}
