<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestAbout extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testAbout()
    {
       // Get a simple page
        $result = $this->call('get', '/about');
        $result->assertSee("Ilham");
        $result->assertOK();

    }
}
