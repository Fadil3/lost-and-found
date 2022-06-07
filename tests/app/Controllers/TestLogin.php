<?php

namespace App;

namespace App\Database;

use CodeIgniter\Test\FeatureTestCase;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;


class TestLogin extends FeatureTestCase
{
    use ControllerTester;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testLoginPage()
    {
        // Get a simple page
        $result = $this->call('get', '/login');
        $result->assertSee("Dont Have an Account ?");
        $result->assertOK();
    }

    public function testSubmitFalseEmailLoginUser()
    {
        // Submit a form
        $data = [
            'email' => 'jontakapor@rocketmail.com',
            'password' => 'jontakp'
        ];
        //post auth
        $result = $this->post('/login/auth', $data);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/login', $url);
    }

    public function testSubmitFalsePasswordLoginUser()
    {
        // Submit a form
        $data = [
            'email' => 'jontakpor@rocketmail.com',
            'password' => 'jontakwwp'
        ];
        //post auth
        $result = $this->post('/login/auth', $data);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/login', $url);
    }

    public function testSubmitLoginUser()
    {
        // Submit a form
        $data = [
            'email' => 'jontakpor@rocketmail.com',
            'password' => 'jontakp'
        ];
        //post auth
        $result = $this->post('/login/auth', $data);
        // cek apakah session berhasil dibuat
        $result->assertSessionHas('logged_in', true);
        $result->assertSessionHas('role', 1);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/profile', $url);
    }

    public function testLihatKlaim()
    {
        // Get a simple page
        $result = $this->call('get', '/pages/daftar_klaim_penemuan/50061/30009');
        $result->assertSee("Klaim Barang Akta kelahiran");
    }

    public function testTerimaKlaim()
    {
        // Get a simple page
        $result = $this->call('get', '/pengajuanbarang/konfirmasipenemuan/50064/19102/30009');
        $criteria = [
            'id_barang'  => '50064',
            'id_korban'  => '19102',
            'id_penemu'  => '30009',
            'konfirmasi_pengajuan' => '1'
        ];
        $this->seeInDatabase('db_pengajuan_barang', $criteria);
    }

    public function testTolakKlaim()
    {
        // Get a simple page
        $result = $this->call('get', '/pengajuanbarang/deletepengajuanpenemuan/123039/30009/50061');
        $criteria = [
            'id_pengajuan'  => '123039',
        ];
        $this->dontSeeInDatabase('db_pengajuan_barang', $criteria);
    }


    public function testKlaimBarang()
    {
        // Get a simple page
        $result = $this->call('get', '/pengajuanbarang/pengajuan/50059/30009');
        $criteria = [
            'id_barang'  => '50059',
            'id_penemu'  => '30009',
            'konfirmasi_pengajuan' => '0'
        ];
        $this->seeInDatabase('db_pengajuan_barang', $criteria);
    }

    public function logout()
    {
        $params = null;
        //post auth
        $result = $this->get('/login/logout', $params);
        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/login', $url);
    }
}
