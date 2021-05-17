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

    public function testSubmitFalseEmailLoginUser()
    {
        // Submit a form
        $data = [
            'email' => 'jontakapor@rocketmail.com',
            'password' => 'jontakp'
        ];
        //post auth
        $result = $this->post('/login/auth',$data);
        
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
        $result = $this->post('/login/auth',$data);
        
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

}
