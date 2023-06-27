<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StatusTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }


    public function testBasicTest()
    {
        $app = $this->createApplication();
        $response = $app->handle($app['request']->create('/'));

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('Laravel', $response->getContent());
    }
}
