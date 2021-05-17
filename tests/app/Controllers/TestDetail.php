<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestDetail extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testDetailPenemuan()
    {
       // Get a simple page
        $result = $this->call('get', '/barang/detail/50054');
        $result->assertSee("Hubungi penemu melalui");
        $result->assertOK();
    }

    public function testDetailKehilangan()
    {
       // Get a simple page
        $result = $this->call('get', '/barang/detail/50058');
        $result->assertSee("Hubungi Pencari melalui");
        $result->assertOK();
    }
}
