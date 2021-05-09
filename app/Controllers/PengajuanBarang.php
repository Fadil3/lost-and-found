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

    //jika barang yang hilang telah ditemukan dan dikembalikan
    public function konfirmasiKehilangan($id_barang, $id_klaim)
    {
        $konfirmasi = $this->pengajuanModel->updateKonfirmasiKehilangan($id_barang, $id_klaim);

        if($konfirmasi){
            $this->session->set_flashdata('success', "Barang Berhasil Diterima"); 
        }
    }

    //jika barang yang ditemukan telah dikembalikan
    public function konfirmasiPenemuan($id_barang, $id_klaim)
    {
        $konfirmasi = $this->pengajuanModel->updateKonfirmasiPenemuan($id_barang, $id_klaim);

        if($konfirmasi){
            $this->session->set_flashdata('success', "Barang Berhasil Diterima"); 
        }
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

    public function deletePengajuan($id)
    {
        $delete = $this->pengajuanModel->deletePengajuan($id);

        if($delete)
        {
            //set flash data
        }
    }

}

?>