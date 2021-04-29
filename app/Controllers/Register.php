<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
use PHPUnit\Util\Xml\Validator;

class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [
            'title' => 'Register | LostandFound'
        ];
        return view('pages/register',$data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required',
            'email'         => 'required|valid_email|is_unique[user.user_email]',
            'password'      => 'required',
            'no_telepon'    => 'required',
            'instagram'     => 'required',
            'facebook'      => 'required',
            'address'       => 'required'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'      => $this->request->getVar('name'),
                'user_alamat'   => $this->request->getVar('address'),
                'user_email'     => $this->request->getVar('email'),
                'user_password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'user_no_telepon'=> $this->request->getVar('no_telepon'),
                'user_instagram' => $this->request->getVar('instagram'),
                'user_facebook'  => $this->request->getVar('facebook')
            ];
            $model->save($data);

            return redirect()->to('/pages/login');
        
        }else{

            $data = [
                'title' => 'Register | LostandFound',
                'validation' => $this->validator
            ];
            return view('/pages/register', $data);
        }
         
    }
}
