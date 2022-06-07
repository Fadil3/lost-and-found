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
    }

    public function testSubmitRegister()
    {

        $data = [
            'name'          => 'Muhammad Rayhan Fadillah',
            "email"         => "rayhanfadil110@gmail.com",
            'noAwal'        => "+62",
            "password"      => "qwerty123",
            "no_telepon"    => "82233131",
            "instagram"     => "xyz.d",
            "facebook"      => "fadiiaal",
            "address"       => "Kab.Bandung Barat",
        ];

        //post auth
        $result = $this->post('/register/save', $data);

        //check if user is redirected to login page
        $result->assertRedirect('/login');

        $criteria = [
            'user_email' => 'rayhanfadil110@gmail.com', "user_name" => "Muhammad Rayhan Fadillah"
        ];
        $this->seeInDatabase('db_user', $criteria);
    }
}
