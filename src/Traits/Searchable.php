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
        $subquery = "(".implode(", ", $searchable) . "as document from ".$table.") search";
        return $query->selectRaw($subquery)
            ->whereRaw()
            ->orderByRaw();
    }
}
