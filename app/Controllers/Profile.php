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
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar max 1MB',
                    'is_image' => 'file yang anda upload bukan gambar',
                    'mime_in' => 'file yang anda upload bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/pages/edit_profile/'. $id)->withInput();
        }

        //ambil gambar
            $fileSampul = $this->request->getFile('sampul');
            
            // apakah tidak ada gamabr yang diupload
            if ($fileSampul->getError() == 4) {
                $namaSampul = 'default-profile.png';
            } else {
            
                //generate nama sampul random
                $namaSampul = $fileSampul->getRandomName();
                
                //pindah file ke folder img
                $fileSampul->move('images/foto_profile', $namaSampul);
            
            }
        
        //memasukan setiap data hampir sama seperti buat laporan
            $data = [
                'user_name'      => $this->request->getVar('name'),
                'user_no_telepon'      => $this->request->getVar('no_telepon'),
                'user_alamat'     => $this->request->getVar('address'),
                'user_email'    => $this->request->getVar('email'),
                'user_instagram' => $this->request->getVar('instagram'),
                'user_facebook'      => $this->request->getVar('facebook'),
                'user_img'      => $namaSampul
            ];
            //memanggil method update barang
        $this->user_model->updateUser($id, $data);

        //melempar halaman ke yang lain
        session()->setFlashdata('msg', 'Profile berhasil diupdate');
        return redirect()->to('/pages/edit_profile/'. $id);
    }

}
