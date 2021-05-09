<?php

namespace CodeIgniter;
namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\StatusBarangModel;
use App\Models\KorbanModel;
use App\Models\PenemuModel;
use App\Models\PengajuanModel;

class Pages extends BaseController
{   
    protected $request;
	protected $barangModel;
    protected $korban_model;
    protected $penemu_model;
    protected $statusModel;
    protected $pengajuan_model;
    protected $session;

    public function __construct()
    {
        $this->barangModel     = new BarangModel();
        $this->korban_model    = new KorbanModel();
        $this->penemu_model    = new PenemuModel();
        $this->statusModel     = new StatusBarangModel();
        $this->pengajuan_model = new PengajuanModel();
        $this->session         = session();
    }
    
    public function index()
    {
        
        $data = [
            'title' => 'Home | LostandFound'
        ];
        return view('pages/home',$data);
    }

    public function login()
    {
        
        $data = [
            'title' => 'Login | LostandFound'
        ];
        return view('pages/login',$data);
    }

    public function register()
    {
        
        $data = [
            'title' => 'Register | LostandFound'
        ];
        return view('pages/register');
    }

    public function cari_laporan()
    {
        
        $data = [
            'title' => 'Cari Laporan | LostandFound'
        ];
        return view('pages/cari_laporan',$data);
    }

    public function buat_laporan()
    {
        
        $data = [
            'title'      => 'Buat Laporan | LostandFound',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/buat_laporan',$data);
    }

    public function edit_laporan($id_barang)
    {
        $data = [
            'title'      => 'Buat Laporan | LostandFound',
            'validation' => \Config\Services::validation(),
            'barang'     => $this->barangModel->getBarang($id_barang)
        ];
        
        return view('pages/edit_laporan',$data);
    }

    public function about()
    {
        
        $data = [
            'title' => 'About | LostandFound'
        ];
        return view('pages/about',$data);
    }

    public function lap_kehilangan()
    {  
        $data = [
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarangKehilangan()
        ];
        return view('Pages/lap_kehilangan', $data);
    }

    public function lap_penemuan()
    {
        $data = [
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarangPenemuan()
        ];
        return view('Pages/lap_penemuan', $data);
    }


    public function detail_lap_kehilangan()
    {
        
        $data = [
            'title' => 'Detail Laporan Kehilangan | LostandFound'
        ];
        return view('pages/lap_kehilangan',$data);
    }

    public function profile()
    {

        $data = [
            'title' => 'My Profile | LostandFound'
        ];
        return view('pages/profile',$data);

    }

    public function detail_lap_penemuan()
    {
        
        $data = [
            'title' => 'Laporan Penemuan | LostandFound'
        ];
        return view('pages/detail_lap_penemuan',$data);
    }

    public function daftar_klaim_kehilangan($id_barang, $id_status)
    {
    //id status di sini ia sebagai korban
    //jadi ketika dia membuka halaman ini
    //maka akan memperlihatkan daftar nama orang yang kehilangan
        
        //data akan dimasukan ke tabel pengajuan
        $dataPBarang = $this->pengajuan_model->getBarangPengajuanKehilangan($id_barang, $id_status);
        $nama_barang = $this->barangModel->getBarang($id_barang);

        //isi data yang akan dilempar nantinya
        $data = [
            'title'       => 'Daftar Klaim | LostandFound',
            'barang'      => $dataPBarang,
            'id_barang'   => $id_barang,
            'id_status'   => $id_status,
            'data_barang' => $nama_barang
        ];
        return view('pages/daftar_klaim_kehilangan',$data);
    }

    public function daftar_klaim_penemuan($id_barang, $id_status)
    {
    //id status di sini ia sebagai korban
    //jadi ketika dia membuka halaman ini
    //maka akan memperlihatkan daftar nama orang yang menyatakan bahwa dia menemukan barang tersebut

        $dataPBarang = $this->pengajuan_model->getBarangPengajuanPenemuan($id_barang, $id_status);
        $nama_barang = $this->barangModel->getBarang($id_barang);

        $data = [
            'title'       => 'Daftar Klaim | LostandFound',
            'barang'      => $dataPBarang,
            'id_barang'   => $id_barang,
            'id_status'   => $id_status,
            'data_barang' => $nama_barang
        ];
        return view('pages/daftar_klaim_penemuan',$data);
    }

    public function admin_lap_selesai()
    {
        $data_pengajuan = $this->pengajuan_model->getBarangSelesai();

        $data = [
            'title' => 'Admin Laporan Selesai | LostandFound',
            'barang'=> $data_pengajuan
        ];
        return view('pages/admin_lap_selesai',$data);
    }

    public function admin_lap_penemuan()
    {  
        $data = [
            'title' => 'Admin Laporan Penemuan | LostandFound',
            'barangPenemuan'   => $this->barangModel->getBarangPenemuanAdmin()
        ];
        return view('pages/admin_lap_penemuan',$data);
    }

    public function admin_lap_kehilangan()
    {

        $data = [
            'title'              => 'Admin Laporan Kehilangan | LostandFound',
            'barangKehilangan'   => $this->barangModel->getBarangKehilanganAdmin(),
        ];
        return view('pages/admin_lap_kehilangan',$data);
    }

    public function lap_acc_user()
    {
        $row_korban = $this->korban_model->getRowIdUser($this->session->user_id);
        $row_penemu = $this->penemu_model->getRowIdUser($this->session->user_id);

        if($row_korban && $row_penemu){
            $data_korban = [
                'id' => $row_korban['id_korban']
            ];

            $data_penemu = [
                'id' => $row_penemu['id_penemu']
            ];

            $data = [
                'title'              => 'laporan yang sudah diterima | LostandFound',
                'barangKehilangan'   => $this->barangModel->getBarangKehilanganSelf($data_korban),
                'barangPenemuan'     => $this->barangModel->getBarangPenemuanSelf($data_penemu),
                'sess'               => $this->session->user_name
            ];

            return view('pages/lap_acc_user',$data);

        }else{

            $data = [
                'title'              => 'laporan yang sudah diterima | LostandFound',
                'barangKehilangan'   => '',
                'barangPenemuan'     => '',
                'sess'               => $this->session->user_name
            ];

            return view('pages/lap_acc_user',$data);
        }

    }

    public function lap_x_acc_user()
    {
        $row_korban = $this->korban_model->getRowIdUser($this->session->user_id);
        $row_penemu = $this->penemu_model->getRowIdUser($this->session->user_id);

        if($row_korban && $row_penemu){
            $data_korban = [
                'id' => $row_korban['id_korban']
            ];

            $data_penemu = [
                'id' => $row_penemu['id_penemu']
            ];

            $data = [
                'title'              => 'laporan yang belum diterima | LostandFound',
                'barangKehilangan'   => $this->barangModel->getBarangKehilanganNotApp($data_korban),
                'barangPenemuan'     => $this->barangModel->getBarangPenemuanNotApp($data_penemu),
                'sess'               => $this->session->user_name
            ];

            return view('pages/lap_x_acc_user',$data);
        }else{

            $data = [
                'title'              => 'laporan yang belum diterima | LostandFound',
                'barangKehilangan'   => '',
                'barangPenemuan'     => '',
                'sess'               => $this->session->user_name
            ];

            return view('pages/lap_x_acc_user',$data);
        }
    }

    public function success()
    {
        
        $data = [
            'title' => 'Klaim Barang Sukses | LostandFound'
        ];
        return view('pages/success',$data);
    }
}
