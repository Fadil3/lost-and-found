<?php

namespace App\Controllers;

class Pages extends BaseController
{
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
            'title' => 'Buat Laporan | LostandFound'
        ];
        return view('pages/buat_laporan',$data);
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
            'title' => 'Laporan Kehilangan | LostandFound'
        ];
        return view('pages/lap_kehilangan',$data);
    }

    public function lap_penemuan()
    {
        
        $data = [
            'title' => 'Laporan Penemuan | LostandFound'
        ];
        return view('pages/lap_penemuan',$data);
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

    public function daftar_klaim()
    {
        
        $data = [
            'title' => 'Daftar Klaim | LostandFound'
        ];
        return view('pages/daftar_klaim',$data);
    }

    public function admin_lap_selesai()
    {
        
        $data = [
            'title' => 'Admin Laporan Selesai | LostandFound'
        ];
        return view('pages/admin_lap_selesai',$data);
    }

    public function admin_lap_penemuan()
    {
        
        $data = [
            'title' => 'Admin Laporan Penemuan | LostandFound'
        ];
        return view('pages/admin_lap_penemuan',$data);
    }
    public function admin_lap_kehilangan()
    {
        
        $data = [
            'title' => 'Admin Laporan Kehilangan | LostandFound'
        ];
        return view('pages/admin_laporan_kehilangan',$data);
    }
}
