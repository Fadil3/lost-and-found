<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestHome extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testHome()
    {
       // Get a simple page
        $result = $this->call('get', '/');
        $result->assertSee("Mempertemukan penemu dan pencari barang yang hilang");
        $result->assertOK();
    }
}
