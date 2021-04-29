<?php 

namespace CodeIgniter;
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangModel;
use App\Models\StatusBarangModel;
use App\Models\KorbanModel;
use App\Models\PenemuModel;

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
	protected $barangModel;
    protected $korban_model;
    protected $penemu_model;
    protected $statusModel;
    protected $session;

    public function __construct()
    {
        $this->barangModel  = new BarangModel();
        $this->korban_model = new KorbanModel();
        $this->penemu_model = new PenemuModel();
        $this->statusModel  = new StatusBarangModel();
        $this->session      = session();
    }


    //untuk menampilkan barang
    //semua barang
    public function index()
    {
        $data = [
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarang()
        ];
        return view('Pages/lap_kehilangan', $data);
    }

    public function kehilangan()
    {
        $data = [
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarangKehilangan()
        ];
        return view('Pages/lap_kehilangan', $data);
    }

    public function penemuan()
    {
        $data = [
            'title' => 'Laporan Kehilangan',
            'barang' => $this->barangModel->getBarangPenemuan()
        ];
        return view('Pages/lap_penemuan', $data);
    }

    public function detail($id)
    {

        $data = [
            'title' => 'Detail Barang ',
            'barang' => $this->barangModel->getBarang($id)
        ];
        
        //jika barang tidak ada

        if (empty($data['barang'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Barang tidak ditemukan');
        }
        // dd($data);
        return view('Pages/detail_lap_kehilangan', $data);
    }

    public function add()
    {   
        //include helper form
        helper(['form']);
        
        //rules untuk validasi data yang akan masuk
        $rules = [
            'name'          => 'required',
            'status'        => 'required',
            'kategori'      => 'required',
            'time'          => 'required',
            'location'      => 'required',
            'description'   => 'required'
        ];
        
        //jika sudah tervalidasi
        if($this->validate($rules)){
            
            //maka ditentukan data yang akan diinput ke dalam database
            //key dengan valuenya
            $data = [
                'nama_barang'      => $this->request->getVar('name'),
                'kategori_barang'  => $this->request->getVar('kategori'),
                'waktu_barang'     => $this->request->getVar('time'),
                'lokasi_barang'    => $this->request->getVar('location'),
                'deskripsi_barang' => $this->request->getVar('description'),
                'foto_barang'      => 'default.jpg'
            ];

            //memanggil method save dari model barang model
            //save langsung secara otomatis menginput ke dalam database
            $this->barangModel->save($data);


            //getInsertID ini adalah method untuk mengambil id terakhir yang dibuat di dalam database
            //id barang yang baru saja ditambahkan
            $barang_id = $this->barangModel->getInsertID();
            $status_barang = $this->request->getVar('status');

            //lalu mengisi data yang nantinya diinputkan ke dalam data status barang
            $data = [
                'id_barang' => $barang_id
            ];
            //instasiasi model status
            //memanggil method save sama seperti hal tadi
            $this->statusModel->save($data);


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
                else
                {
                    $data_korban = [
                        'id_user'      => $this->session->user_id,
                        'nama_korban'  => $this->session->user_name
                    ];
                    //instansiasi objek                   
                    $korban_model->save($data_korban);
                    $new_id_korban = $korban_model->getInsertID();

                    $data = [
                        'id_korban' => $new_id_korban
                    ];   
                    //metod buatan sendiri
                    //pada barangModel
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
                else
                {
                    $data_penemu = [
                        'id_user'      => $this->session->user_id,
                        'nama_penemu'  => $this->session->user_name
                    ]; 
                    //instansiasi objek
                    $penemu_model->save($data_penemu);
                    $new_id_penemu = $penemu_model->getInsertID();
                    $data = [
                        'id_penemu' => $new_id_penemu
                    ];
                    //metod buatan sendiri
                    //pada barangModel
                    $this->barangModel->updateKP($barang_id, $data);      
                }
            }
            
            $row_korban = $this->korban_model->getRowIdUser($this->session->user_id);

            $data = [
                'title'  => 'Laporan Kehilangan',
                'barang' => $this->barangModel->getBarang()
            ];
            // dd($data);
            return view('Pages/lap_kehilangan', $data);
            
        }else{
            //jika ada data yang belum diisi, akan ada permintaan validasi
            $data['validation'] = $this->validator;
            //dilempar kembali ke menu laporan
            echo view('/pages/buat_laporan', $data);
        }
    }
}

?>
