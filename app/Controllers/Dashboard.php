<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
            'title'     => 'Profile | LostandFound',
            'nama_user' => $session->user_nama
        ];
        return view('pages/profile',$data);
    }
}