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
    
    public function edit($id)
    {
        helper(['form']);

        if (!$this->validate([
            'name'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fullname harus diisi',
                ]
            ],
            'no_telepon'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon harus diisi',
                ]
            ],
            'address'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'facebook'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'instagram'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ])) {
            $validation =  \Config\Services::validation();
            // return redirect()->to('/pages/edit_profile/'. $id)->withInput()->with('validation', $validation);
            return redirect()->to('/pages/edit_profile/'. $id)->withInput();
        }
    }
}
