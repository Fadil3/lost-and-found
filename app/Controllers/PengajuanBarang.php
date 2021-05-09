<?php

namespace CodeIgniter;
namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\PengajuanModel;
use App\Models\UserModel;

class PengajuanBarang extends BaseController
{

    private $pengajuanModel;
    private $barangModel;
    private $session;

    public function __construct(){
        $this->barangModel    = new BarangModel();
        $this->pengajuanModel = new PengajuanModel();
        $this->session        = session();
    }

    public function pengajuan($id_barang, $id_klaim){
    //method untuk memasukan data ke tabel pengajuan_barang

        //pertama menggunakan model barang
        //model barang ini berisi akses ke tabel barang
        $barang = $this->barangModel->getBarang($id_barang);

        //jika barang merupakan barang kehilangan maka
        if($barang['id_korban']){   

            //data yang dimasukan disesuaikan
            //id_penemu diisi oleh id_klaim, yang berarti id penemu diisi oleh orang yang kehilangan
            $data = [
                'id_barang' => $id_barang,
                'id_penemu' => $id_klaim,
                'id_korban' => $barang['id_korban']
            ];

            $this->pengajuanModel->save($data);    

        }else if($barang['id_penemu']){
            
            $data = [
                'id_barang' => $id_barang,
                'id_korban' => $id_klaim,
                'id_penemu' => $barang['id_penemu']
            ];

            $this->pengajuanModel->save($data);

        }
        
    }

}

?>