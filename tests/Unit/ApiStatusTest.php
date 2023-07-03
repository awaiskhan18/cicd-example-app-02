<?php


namespace Tests\Unit;
use PHPUnit\Framework\TestCase;

class ApiStatusTest extends TestCase
{

    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }

    public function testBasicTest()
    {
        $app = $this->createApplication();
        $response = $app->handle($app['request']->create('/api/check_server'));

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('Server is Down', $response->getContent());
    }

}
