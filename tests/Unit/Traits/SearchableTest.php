<?php

namespace Tests\Unit\Traits;

use Tests\TestCase;
use Tests\Fixtures\Post;

class SearchableTest extends TestCase
{
    public function testCreateSearchable()
    {
        $model = new Post;
        $this->assertHasTrait('Matthewbdaly\LaravelPostgresFullTextSearch\Traits\Searchable', $model);
    }

    public function testScope()
    {
        $model = new Post;
        $query = Post::search('foo');
        $this->assertEquals('select * from "posts"', $query->toSql());
    }

    public function testScopeEmpty()
    {
        $model = new Post;
        $query = Post::search('');
        $this->assertEquals('select * from "posts"', $query->toSql());
    }
}
