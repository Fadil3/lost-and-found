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
        $result = $this->call('get', '/barang/detail/50061');
        $result->assertSee("Hubungi penemu melalui");
        $result->assertDontSee("Ini Adalah Barang Saya !");
        $result->assertOK();
    }

    public function testDetailKehilangan()
    {
       // Get a simple page
        $result = $this->call('get', '/barang/detail/50058');
        $result->assertSee("Hubungi Pencari melalui");
        $result->assertDontSee("Saya telah menemukan barang Ini!");
        $result->assertOK();
    }
}
