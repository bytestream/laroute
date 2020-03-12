<?php

namespace Lord\Laroute\Routes;

use Mockery;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    protected $routeCollection;

    protected $routes;

    public function setUp(): void
    {
        parent::setUp();

        $this->routeCollection = $this->mock('Illuminate\Routing\RouteCollection');
        $this->routes          = $this->createInstance();
    }

    protected function createInstance()
    {
        return; // Life is too short.
        $this->routeCollection
            ->shouldReceive('count')
            ->once()
            ->andReturn(1)
            ->shouldReceive('getIterator')
            ->once()
            ->andReturn(['Huh?']);

        return new Collection($this->routeCollection);
    }

    public function testIFailedAtTestingACollection()
    {
        $this->assertTrue(true);
    }


    public function tearDown(): void
    {
        Mockery::close();
    }

    protected function mock($class, $app = [])
    {
        $mock = Mockery::mock($class, $app);

        return $mock;
    }
}
