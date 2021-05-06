<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Profile extends BaseController
{   
    protected $session;
    protected $user_model;

    public function __construct(){
        $this->user_model = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Profile | LostandFound',
            'user'  => $this->user_model->getUser($this->session->user_id)
        ];
        return view('pages/profile',$data);
    }
 
}