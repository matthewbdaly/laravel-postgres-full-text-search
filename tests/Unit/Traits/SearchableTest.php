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
        $this->assertEquals('select * from (select *, to_tsvector(\'english\', posts.title) || to_tsvector(\'english\', posts.text) as document from "posts") search where search.document @@ to_tsquery(\'english\', \'foo\') order by ts_rank(search.document, to_tsquery(\'english\', \'foo\')) desc', $query->toSql());
    }

    public function testScopeEmpty()
    {
        $model = new Post;
        $query = Post::search('');
        $this->assertEquals('select * from "posts"', $query->toSql());
    }
}
