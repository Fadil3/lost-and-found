<?php

namespace CodeIgniter;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;

class TestGetLaporan extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testGetKehilangan()
    {
        $result = $this->controller(\App\Controllers\Pages::class)
            ->execute('lap_kehilangan');
        $this->assertTrue($result->isOK());
    }

    public function testGetPenemuan()
    {
        $result = $this
            ->controller(\App\Controllers\Pages::class)
            ->execute('lap_Penemuan');
        $this->assertTrue($result->isOK());
    }

    // public function testSubmitRegister()
    // {
    //     $body = json_encode([
    //         'name'          => 'Muhammad Rayhan Fadillah',
    //         'email'         => 'rayhanfadil10@gmail.com',
    //         "noAwal"        => '+62',
    //         'password'      => 'qwerty123',
    //         'no_telepon'    => '+6282233131',
    //         'instagram'     => 'fadiil',
    //         'facebook'      => 'fadiil',
    //         'address'       => 'Kab. Bandung Barat'
    //     ]);

    //     $results = $this->withBody($body)
    //         ->controller(\App\Controllers\Register::class)
    //         ->execute('save', $body);

    //     $criteria = [
    //         'user_name'  => 'Muhammad Rayhan Fadillah',
    //         'user_email' => 'rayhanfadil10@gmail.com'
    //     ];
    //     $this->seeInDatabase('db_user', $criteria);
    // }

    // public function testSubmitRegister2()
    // {
    //     $results = $this->controller(\App\Controllers\Register::class)
    //         ->execute('save', [
    //             $_POST['name']    => 'Muhammad Rayhan Fadillah',
    //             $_POST['email']    => 'rayhanfadil10@gmail.com',
    //             $_POST["noAwal"]    => '+62',
    //             $_POST['password']    => 'qwerty123',
    //             $_POST['no_telepon']    => '+6282233131',
    //             $_POST['instagram']    => 'fadiil',
    //             $_POST['facebook']    => 'fadiil',
    //             $_POST['address']    => 'Kab. Bandung Barat'
    //         ]);

    //     $criteria = [
    //         'user_name'  => 'Muhammad Rayhan Fadillah',
    //         'user_email' => 'rayhanfadil10@gmail.com'
    //     ];
    //     $this->seeInDatabase('db_user', $criteria);
    // }
}
