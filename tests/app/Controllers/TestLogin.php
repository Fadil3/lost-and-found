<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestLogin extends FeatureTestCase
{
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

    public function testSubmitLoginUser()
    {
        // Submit a form
        $data = [
            'email' => 'jontakpor@rocketmail.com',
            'password' => 'jontakp'
        ];
        //post auth
        $result = $this->post('/login/auth',$data);
        // cek apakah session berhasil dibuat
        $result->assertSessionHas('logged_in',true);
        $result->assertSessionHas('role',1);

        //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/profile', $url);
        
    }

    public function logout()
    {
        $params=null;
         //post auth
        $result = $this->get('/login/logout',$params);
         //cek redirect kemana
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/login', $url);
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
}
