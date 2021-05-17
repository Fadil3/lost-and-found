<?php

namespace CodeIgniter;

use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;

class TestGetLaporan extends CIDatabaseTestCase
{
    use ControllerTester;

    public function testGetKehilangan()
    {
        $result = $this->withURI('https://localhost:8080/lap_kehilangan')
                       ->controller(\App\Controllers\Pages::class)
                       ->execute('lap_kehilangan');
        $this->assertTrue($result->isOK());
    }

    public function testGetPenemuan()
    {
        $result = $this->withURI('https://localhost:8080/lap_Penemuan')
                       ->controller(\App\Controllers\Pages::class)
                       ->execute('lap_Penemuan');
        $this->assertTrue($result->isOK());
    }

    //  public function testGetDetailKehilangan()
    // {
    //     $result = $this->withURI('http://localhost:8080/barang/detail/50054')
    //                    ->controller(\App\Controllers\Pages::class)
    //                    ->execute('lap_kehilangan');
    //     $this->assertTrue($result->isOK());
    // }

    // public function testGetDetailPenemuan()
    // {
    //     $result = $this->withURI('http://localhost:8080/barang/detail/50054')
    //                    ->controller(\App\Controllers\Barang::class)
    //                    ->execute('detail');
    //     $this->assertTrue($result->isOK());
    // }
}
