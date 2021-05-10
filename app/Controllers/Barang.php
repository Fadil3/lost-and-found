<?php 

namespace CodeIgniter;
namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\StatusBarangModel;
use App\Models\KorbanModel;
use App\Models\PenemuModel;
use App\Models\UserModel;

/**
 * Class Controller
 */
class Barang extends BaseController
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;
	protected $barangModel;
    protected $korban_model;
    protected $penemu_model;
    protected $statusModel;
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->barangModel  = new BarangModel();
        $this->korban_model = new KorbanModel();
        $this->penemu_model = new PenemuModel();
        $this->statusModel  = new StatusBarangModel();
        $this->userModel    = new UserModel();
        $this->session      = session();
    }

    public function detail($id)
    {
        $barang      = $this->barangModel->getBarang($id);
        $penemu      = (int)$barang['id_penemu'];
        $pencari     = (int)$barang['id_korban'];
        $userPencari = $this->korban_model->getID($pencari);
        $userPenemu  = $this->penemu_model->getID($penemu);
        $getPencari  = $userPencari != null ? $this->userModel->getUser($userPencari['id_user']):null;
        $getPenemu   = $userPenemu  != null ? $this->userModel->getUser($userPenemu['id_user']) :null;

        $userkorban  = $this->korban_model->getRowIdUser($this->session->user_id);
        $id_penemu   = $this->penemu_model->getRowIdUser($this->session->user_id);
        // dd($getPencari);

        $data = [
            'title'     => 'Detail Barang ',
            'barang'    => $barang,
            'pencari'   => $getPencari,
            'penemu'    => $getPenemu,
            'userKorban'=> $userkorban,
            'userPenemu'=> $id_penemu
        ];
        
        //jika barang tidak ada
        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }
        if($data['barang']['id_penemu'] == null && $data['barang']['id_korban'] != null){
            return view('Pages/detail_lap_kehilangan', $data);
        }
        else if ($data['barang']['id_penemu'] != null && $data['barang']['id_korban'] == null) {
            return view('Pages/detail_lap_penemuan', $data);
        }
    }

    public function add()
    {   
        //include helper form
        helper(['form']);
        if (!$this->validate([
            'name'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'status'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'kategori'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'time'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'location'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'description'          => [
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
            return redirect()->to('/pages/buat_laporan')->withInput();
        }
        
            //jika sudah tervalidasi
            
            //ambil gambar
            $fileSampul = $this->request->getFile('sampul');
            
            // apakah tidak ada gamabr yang diupload
            if ($fileSampul->getError() == 4) {
                $namaSampul = 'default.png';
            } else {
            
                //generate nama sampul random
                $namaSampul = $fileSampul->getRandomName();
                
                //pindah file ke folder img
                $fileSampul->move('images', $namaSampul);
            
            }

            if ($this->request->getVar('status') == "Jenis Laporan...") {
                session()->setFlashdata('msg2', 'Jenis laporan belum dipilih');
                return redirect()->to('/pages/buat_laporan')->withInput();
            }
            
            if ($this->request->getVar('kategori') == "Kategori barang ...") {
                session()->setFlashdata('msg2', 'Kategori barang belum dipilih');
                return redirect()->to('/pages/buat_laporan')->withInput();
            }
            

            //maka ditentukan data yang akan diinput ke dalam database
            //key dengan valuenya
            $data = [
                'kd_hilang'        => 'ST-00',
                'kd_approve'       => 'AP-00',
                'nama_barang'      => $this->request->getVar('name'),
                'kategori_barang'  => $this->request->getVar('kategori'),
                'waktu_barang'     => $this->request->getVar('time'),
                'lokasi_barang'    => $this->request->getVar('location'),
                'deskripsi_barang' => $this->request->getVar('description'),
                'foto_barang'      => $namaSampul
            ];


            //memanggil method save dari model barang model
            //save langsung secara otomatis menginput ke dalam database
            $this->barangModel->save($data);


            //getInsertID ini adalah method untuk mengambil id terakhir yang dibuat di dalam database
            //id barang yang baru saja ditambahkan
            $barang_id = $this->barangModel->getInsertID();
            $status_barang = $this->request->getVar('status');

            //------------------------CLEAR------------------------
            //murni inputan pasti ditambahkan tidak mungkin ada data yang sama
            //------------------------CLEAR------------------------
            
            //memasukan attribut id korban kedalam tabel barang
            if($status_barang == 0)
            {
                //data yang akan dimasukan ke dalam tabel korban
                //memastikan tabel korban tidak memiliki id_user yang sama
                $row_korban = $this->korban_model->getRowIdUser($this->session->user_id);
                
                //jika ada user yang sama maka row akan ditemukan
                //sehingga tidak perlu dibuat data korban yang baru
                if($row_korban)
                {                   
                    $barang_id_korban = [
                        'id_korban' => $row_korban['id_korban']
                    ];
                    $data = [
                        'id_korban' => $row_korban['id_korban']
                    ];
                    //memasukan id_korban ke dalam tabel barang
                    $this->barangModel->updateKP($barang_id, $data);
                }
            
            //else untuk memasukan data penemu kedalam tabel penemu
            }
            else
            {
                $row_penemu = $this->penemu_model->getRowIdUser($this->session->user_id);
                //sama seperti pada bagian status kehilangan
                if($row_penemu)
                {
                    $barang_id_penemu = [
                        'id_penemu' => $row_penemu['id_penemu']
                    ];
                    $data = [
                        'id_penemu' => $row_penemu['id_penemu']
                    ];

                    $this->barangModel->updateKP($barang_id, $data);
                }
            }
            
            $row_korban = $this->korban_model->getRowIdUser($this->session->user_id);

            $data = [
                'title'  => 'Laporan Kehilangan',
                'barang' => $this->barangModel->getBarang()
            ];
            // dd($data);
            session()->setFlashdata('msg', 'Data berhasil ditambah');
            return redirect()->to('/pages/buat_laporan');
    }

    public function updateData($data_id)
    {
        
        helper(['form']);

        if (!$this->validate([
            'name'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'time'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'location'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'description'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/pages/edit_laporan');
        }

        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
            
        // apakah tidak ada gamabr yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->barangModel->getBarang($data_id);
        } else {
        
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            
            //pindah file ke folder img
            $fileSampul->move('images', $namaSampul);
        
        }

        //memasukan setiap data hampir sama seperti buat laporan
        $data = [
            'nama_barang'      => $this->request->getVar('name'),
            'waktu_barang'     => $this->request->getVar('time'),
            'lokasi_barang'    => $this->request->getVar('location'),
            'deskripsi_barang' => $this->request->getVar('description'),
            'foto_barang'      => $namaSampul['foto_barang']
        ];

        //memanggil method update barang
        $this->barangModel->updateBarang($data_id, $data);

        //melempar halaman ke yang lain
        session()->setFlashdata('msg', 'Data berhasil diupdate');
        return redirect()->to('/pages/lap_acc_user');
    }

    public function updateHilang($id)
    {
        $update = $this->barangModel->updateKdHilang($id);

        if($update)
        {
            //flashdata
        }
    }

    public function deleteData($id)
    {
        $this->barangModel->where('id_barang', $id)->delete();
    }

    public function delete($id)
    {
        $this->barangModel->deleteBarangPermintaan($id);

        return redirect()->to('/pages/admin_lap_kehilangan');
    }

    public function update($data_id)
    {
        $this->barangModel->updateBarangPermintaan($data_id);

        return redirect()->to('/pages/admin_lap_kehilangan');
    }
}
?>