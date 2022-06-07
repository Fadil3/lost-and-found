<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestAdmin extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testSubmitLoginAdmin()
    {
        // Submit a form
        $data = [
            'email' => 'Fadilfadil@gmail.com',
            'password' => 'fadilfadil'
        ];
        //post auth
        $result = $this->post('/login/auth', $data);
        // cek apakah session berhasil dibuat
        $result->assertSessionHas('logged_in', true);
        $result->assertSessionHas('role', 0);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
    }

    public function testSelesaiLaporan()
    {
        $params = null;
        $result = $this->get('/barang/updateHilang/50058', $params);
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
        $criteria = [
            'id_barang'  => '50058',
            'kd_hilang' => 'ST-01'
        ];
        $this->seeInDatabase('db_barang', $criteria);
    }

    public function testDetailLaporan()
    {
        // Get a simple page
        $result = $this->call('get', '/barang/detail/50062');
        $result->assertSee("Hubungi penemu melalui");
        $result->assertOK();
    }

    public function testTerimaLaporan()
    {

        $result = $this->call('get', '/barang/update/50063');
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_kehilangan', $url);
        $criteria = [
            'id_barang'  => '50063',
            'kd_approve' => 'AP-01'
        ];
        $this->seeInDatabase('db_barang', $criteria);
    }

    public function testTolakLaporan()
    {
        $params = null;
        $result = $this->get('/barang/delete/50062', $params);
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_kehilangan', $url);
        $criteria = [
            'id_barang'  => '50062',
        ];
        $this->dontSeeInDatabase('db_barang', $criteria);
    }
}
