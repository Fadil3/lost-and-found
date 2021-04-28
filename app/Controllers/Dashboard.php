<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $data = [
            'title' => 'My Profile | LostandFound'
        ];
        return view('pages/profile',$data);
    }
}