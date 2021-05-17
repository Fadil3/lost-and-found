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
        $result = $this->post('/login/auth',$data);
        // cek apakah session berhasil dibuat
        $result->assertSessionHas('logged_in',true);
        $result->assertSessionHas('role',0);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);        
    }

    public function testSelesaiLaporan()
    {
        $params=null;
        $result = $this->get('/barang/updateHilang/50056',$params);
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
    }

    // public function testDetailLaporan()
    // {
    //     $params=null;
    //     $result = $this->get('/barang/updateHilang/50056',$params);
    //     $url = $result->getRedirectUrl();
    //     $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
    // }

    // public function testTerimaLaporan()
    // {
    //     $params=null;
    //     $result = $this->get('/barang/updateHilang/50056',$params);
    //     $url = $result->getRedirectUrl();
    //     $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
    // }

    // public function testTolakLaporan()
    // {
    //     $params=null;
    //     $result = $this->get('/barang/updateHilang/50056',$params);
    //     $url = $result->getRedirectUrl();
    //     $this->assertEquals('http://localhost:8080/admin_lap_selesai', $url);
    // }
}
