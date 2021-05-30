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

    
    public function testSubmitRegister()
    {
        
        $data =[
            'name'          => 'Muhammad Rayhan Fadillah',
            'email'         => 'rayhanfadil10@gmail.com',
            'password'      => '123',
            'no_telepon'    => '+6282233131',
            'instagram'     => 'fadiil',
            'facebook'      => 'fadiil',
            'address'       => 'Kab. Bandung Barat'
        ];
        
        //post auth
        $result = $this->post('/register/save',$data);
        
        //cek redirect kalau benar
        $url = $result->getRedirectUrl();
        $this->assertEquals('http://localhost:8080/login', $url);

        $criteria = [
            'user_name'  => 'Muhammad Rayhan Fadillah',
            'user_email' => 'rayhanfadil10@gmail.com'
        ];
        $this->seeInDatabase('db_user', $criteria);
    }
    
    public function testSubmitRegisterError()
    {
        
        $data =[
            'name'          => 'Muhammad Rayhan Fadillah',
            'email'         => 'rayhanfadil10@gmail.com',
            'password'      => '',
            'no_telepon'    => '+6282233131',
            'instagram'     => 'fadiil',
            'facebook'      => '',
            'address'       => ''
        ];
        
        //post auth
        $result = $this->post('/register/save',$data);
        $result->assertSee('The password field is required.');
    }
}
