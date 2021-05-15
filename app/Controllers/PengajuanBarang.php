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
    public function konfirmasiKehilangan($id_barang, $id_klaim, $id_status)
    {
        $konfirmasi = $this->pengajuanModel->updateKonfirmasiKehilangan($id_barang, $id_klaim);

        $this->session->setFlashdata('msg_konfirmasi', "Barang Berhasil Diterima");
        
        return redirect()->to('/pages/daftar_klaim_kehilangan/'.$id_barang.'/'.$id_status);
    
    }

    //jika barang yang ditemukan telah dikembalikan
    public function konfirmasiPenemuan($id_barang, $id_klaim, $id_status)
    {
        $konfirmasi = $this->pengajuanModel->updateKonfirmasiPenemuan($id_barang, $id_klaim);

        $this->session->setFlashdata('msg_konfirmasi', "Barang Berhasil Diterima");
        
        return redirect()->to('/pages/daftar_klaim_penemuan/'.$id_barang.'/'.$id_status);
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

        $this->session->setFlashdata('msg_pengajuan', 'Pengajuan berhasil dikirmkan!');
        return redirect()->to('/barang/detail/'. $id_barang);
        
    }

    public function deletePengajuanKehilangan($id, $id_status, $id_barang)
    {
        $delete = $this->pengajuanModel->deletePengajuan($id);

        $this->session->setFlashdata('msg_tolak', 'Pengajuan ditolak!');

        return redirect()->to('/pages/daftar_klaim_kehilangan/'.$id_barang.'/'.$id_status);
    }

    public function deletePengajuanPenemuan($id, $id_status, $id_barang)
    {
        $delete = $this->pengajuanModel->deletePengajuan($id);

        $this->session->setFlashdata('msg_tolak', 'Pengajuan ditolak!');

        return redirect()->to('/pages/daftar_klaim_penemuan/'.$id_barang.'/'.$id_status);
    }

    public function deletePengajuanSelesai()
    {
        
    }
}

?>