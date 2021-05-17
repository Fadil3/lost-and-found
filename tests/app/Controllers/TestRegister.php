<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestRegister extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testRegister()
    {
       // Get a simple page
        $result = $this->call('get', '/register');
        $result->assertSee("Create Account");
        $result->assertOK();

    }
}
