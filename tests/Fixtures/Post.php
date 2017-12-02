<?php

namespace Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Matthewbdaly\LaravelPostgresFullTextSearch\Traits\Searchable;

class Post extends Model
{
    use Searchable;

    protected $searchable = [
        'title',
        'text',
    ];
}
