<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('/pages/login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        // dd($data);
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'role'          => $data['user_role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                // dd($data);
                //kalau role nya admin / 0
                if ($data['user_role'] == 0) {
                    return redirect()->to('/admin_lap_selesai');
                }
                else {
                    return redirect()->to('/profile');
                }

            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/pages/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/pages/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
