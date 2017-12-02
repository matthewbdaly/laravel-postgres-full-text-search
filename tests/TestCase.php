<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Mockery as m;

class TestCase extends BaseTestCase
{
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }

    public function assertHasTrait($trait, $class, $message = '')
    {
        $traits = class_uses($class);
        self::assertThat(in_array($trait, $traits), self::isTrue(), $message);
    }
}
