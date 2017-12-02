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
        $this->app['config']->set('fulltextsearch.language', 'english');
        $model = new Post;
        $query = Post::search('foo');
        $this->assertEquals('select posts.id, to_tsvector(\'english\', posts.title), to_tsvector(\'english\', posts.text) from "posts"', $query->toSql());
    }

    public function testScopeEmpty()
    {
        $model = new Post;
        $query = Post::search('');
        $this->assertEquals('select * from "posts"', $query->toSql());
    }
}
