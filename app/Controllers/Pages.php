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
        return view('pages/register',$data);
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
}
