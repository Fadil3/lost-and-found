<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        
        $data = [
            'title' => 'Home | LostandFound'
        ];
        return view('pages/home');
    }

    public function login()
    {
        
        $data = [
            'title' => 'Login | LostandFound'
        ];
        return view('pages/login');
    }

    public function register()
    {
        
        $data = [
            'title' => 'Register | LostandFound'
        ];
        return view('pages/register');
    }
}
